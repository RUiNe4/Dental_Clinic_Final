<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
    var labels = {{ Js::from($labels) }};
    var users = {{ Js::from($data) }};
    const data = {
        labels: labels,
        datasets: [{
            label: 'Daily Revenue',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: users,
        }]
    };
    
    const config = {
        type: 'line',
        data: data,
        options: {}
    };
    
    const myChart = new Chart(
      document.getElementById('myChart'),
      config,
    );

</script>