import Chart from 'chart.js/auto';

export default class ChartManager {
    constructor() {
        this.init();
    }

    init() {
        const charts = document.querySelectorAll('.chartjs');
        charts.forEach((canvas) => this.renderChart(canvas));
    }

    renderChart(canvas) {
        try {
            const type = canvas.dataset.type || 'bar';
            const datasets = JSON.parse(canvas.dataset.datasets || '[]');
            const labels = JSON.parse(canvas.dataset.labels || '[]');
            const options = JSON.parse(canvas.dataset.options || '{}');

            new Chart(canvas, {
                type: type,
                data: { labels, datasets },
                options: options,
            });
        } catch (error) {
            console.error('Error renderizando el gráfico:', error);
        }
    }
}
