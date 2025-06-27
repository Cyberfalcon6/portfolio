import sys
from math import pi, sin
from typing import cast
 
from PySide6.QtCharts import QChart, QChartView, QLineSeries
from PySide6.QtCore import QEvent, QPoint, QPointF, QRandomGenerator, Qt
from PySide6.QtGui import QKeyEvent, QMouseEvent, QPainter, QWheelEvent
from PySide6.QtWidgets import (
    QApplication,
    QGestureEvent,
    QGraphicsItem,
    QMainWindow,
    QPanGesture,
    QPinchGesture,
    QWidget,
)
 
 
class Chart(QChart):
    def __init__(
        self,
        parent: QGraphicsItem | None = None,
        flags: Qt.WindowType = Qt.WindowType(0),
        /,
    ) -> None:
        super().__init__(QChart.ChartType.ChartTypeCartesian, parent, flags)
 
        # Seems that QGraphicsView (QChartView) does not grab gestures.
        # They can only be grabbed here in the QGraphicsWidget (QChart).
        self.grabGesture(Qt.GestureType.PanGesture)
        self.grabGesture(Qt.GestureType.PinchGesture)
 
    def sceneEvent(self, event: QEvent, /) -> bool:
        if event.type() == QEvent.Type.Gesture:
            return self.gestureEvent(cast(QGestureEvent, event))
        return super().event(event)
 
    def gestureEvent(self, event: QGestureEvent, /) -> bool:
        if (gesture := event.gesture(Qt.GestureType.PanGesture)) is not None:
            pan: QPanGesture = cast(QPanGesture, gesture)
            super().scroll(-(pan.delta().x()), pan.delta().y())
 
        if (gesture := event.gesture(Qt.GestureType.PinchGesture)) is not None:
            pinch: QPinchGesture = cast(QPinchGesture, gesture)
            if pinch.changeFlags() & QPinchGesture.ChangeFlag.ScaleFactorChanged:
                super().zoom(pinch.scaleFactor())
 
        return True
 
 
class ChartView(QChartView):
    def __init__(self, chart: QChart | None, /, parent: QWidget | None = None) -> None:
        super().__init__(chart, parent)
 
        self._is_touching: bool = False
        self._drag_start: QPointF = QPointF()
 
        self.setRubberBand(QChartView.RubberBand.RectangleRubberBand)
 
    def viewportEvent(self, event: QEvent) -> bool:
        if event.type() == QEvent.Type.TouchBegin:
            # By default, touch events are converted to mouse events. So
            # after this event we will get a mouse event also, but we want
            # to handle touch events as gestures only. So we need this safeguard
            # to block mouse events that are actually generated from touch.
            self._is_touching = True
 
            # Turn off animations when handling gestures they
            # will only slow us down.
            self.chart().setAnimationOptions(QChart.AnimationOption.NoAnimation)
 
        elif event.type() == QEvent.Type.Wheel:
            delta: QPoint = cast(QWheelEvent, event).angleDelta()
            if delta.y() > 0:
                self.chart().zoomIn()
            elif delta.y() < 0:
                self.chart().zoomOut()
 
        return super().viewportEvent(event)
 
    def mousePressEvent(self, event: QMouseEvent) -> None:
        if self._is_touching:
            return
        if event.button() == Qt.MouseButton.MiddleButton:
            self._drag_start = event.position()
            self.chart().setAnimationOptions(QChart.AnimationOption.NoAnimation)
            print("middle", event.position(), end=" ")
            return
 
        return super().mousePressEvent(event)
 
    def mouseMoveEvent(self, event: QMouseEvent) -> None:
        if self._is_touching:
            return
        if event.buttons() == Qt.MouseButton.MiddleButton:
            position: QPointF = event.position()
            if not self._drag_start.isNull():
                self.chart().scroll(
                    self._drag_start.x() - position.x(),
                    position.y() - self._drag_start.y(),
                )
            self._drag_start = position
            return
        return super().mouseMoveEvent(event)
 
    def mouseReleaseEvent(self, event: QMouseEvent) -> None:
        if self._is_touching:
            self._is_touching = False
 
        if event.button() == Qt.MouseButton.MiddleButton:
            self._drag_start = QPointF()
            self.chart().setAnimationOptions(QChart.AnimationOption.SeriesAnimations)
            return
 
        # Because we disabled animations when touch event was detected
        # we must put them back on.
        self.chart().setAnimationOptions(QChart.AnimationOption.SeriesAnimations)
 
        return super().mouseReleaseEvent(event)
 
    def keyPressEvent(self, event: QKeyEvent) -> None:
        match event.key():
            case Qt.Key.Key_Plus:
                self.chart().zoomIn()
            case Qt.Key.Key_Minus:
                self.chart().zoomOut()
            case Qt.Key.Key_Left:
                self.chart().scroll(-10, 0)
            case Qt.Key.Key_Right:
                self.chart().scroll(10, 0)
            case Qt.Key.Key_Up:
                self.chart().scroll(0, 10)
            case Qt.Key.Key_Down:
                self.chart().scroll(0, -10)
            case _:
                super().keyPressEvent(event)
 
 
def main() -> int:
    a: QApplication = QApplication(sys.argv)
 
    series: QLineSeries = QLineSeries()
    for i in range(500):
        p: QPointF = QPointF(float(i), sin(pi / 50 * i) * 100)
        p.setY(p.y() + QRandomGenerator.global_().bounded(20))
        series << p
 
    chart: Chart = Chart()
    chart.addSeries(series)
    chart.setTitle(chart.tr("Zoom in/out example"))
    chart.setAnimationOptions(QChart.AnimationOption.SeriesAnimations)
    chart.legend().hide()
    chart.createDefaultAxes()
 
    chart_view: ChartView = ChartView(chart)
    chart_view.setRenderHint(QPainter.RenderHint.Antialiasing)
 
    window: QMainWindow = QMainWindow()
    window.setCentralWidget(chart_view)
    window.resize(400, 300)
    window.grabGesture(Qt.GestureType.PanGesture)
    window.grabGesture(Qt.GestureType.PinchGesture)
    window.show()
 
    return a.exec()
 
 
if __name__ == "__main__":
    main()