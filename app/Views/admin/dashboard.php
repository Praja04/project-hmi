<?= $this->extend('admin/template') ?>

<?= $this->section('aside-dashboard-active') ?>
active bg-gradient-primary
<?= $this->endSection() ?>


<?= $this->section('pages-dashboard') ?>
Dashboard HSM Head 1
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">weekend</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Data Keseluruhan</p>
                        <h4 id="total"></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"> <span class="text-success text-sm font-weight-bolder">Data </span>per Hari Ini</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Data Yang </p>
                        <p class="text-sm mb-0 text-capitalize">Sering Muncul</p>
                        <h4 class="mb-0" id="modeleft">°C</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Data </span>TEMPERATUR LEFT</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Data yang Masuk</p>
                        <h4 class="mb-0" id="datatoday"></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">Data </span>Per Hari Ini</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">weekend</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Data Yang </p>
                        <p class="text-sm mb-0 text-capitalize">Sering Muncul</p>
                        <h4 class="mb-0" id="moderight">°C</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Data </span>TEMPERATUR RIGHT</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Grafik-->
<div class="row mt-2">
    <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="myChart1" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0 ">TEMPERATUR LEFT</h6>
                <p class="text-sm ">Parameter HSM Line 6 Head 1</p>
                <hr class="dark horizontal">
                <div class="d-flex ">
                    <i class="material-icons text-sm my-auto me-1">schedule</i>
                    <p class="mb-0 text-sm"> Per hari ini </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mt-4 mb-3">
        <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="myChart2" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0 ">TEMPERATUR RIGHT</h6>
                <p class="text-sm ">Parameter HSM Line 6 Head 1</p>
                <hr class="dark horizontal">
                <div class="d-flex ">
                    <i class="material-icons text-sm my-auto me-1">schedule</i>
                    <p class="mb-0 text-sm">per hari ini</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--end of grafik -->
<div class="row mb-4">
    <div class="col-lg-4 col-md-6 col-md-6 mt-4 mb-4">
        <div class="card h-100">
            <div class="card-header pb-0">
                <h6>Data overview</h6>
                <p class="text-sm">
                    <i class="fa fa-arrow-down text-danger" aria-hidden="true"></i>
                    <span class="font-weight-bold">Data Temp-Left</span> dibawah atau diatas ambang batas
                </p>
            </div>
            <div class="card-body p-3">
                <div class="timeline timeline-one-side" style="overflow-y: scroll; max-height: 300px;" id="damang">

                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="col-lg-4 col-md-6">
        <div class="card h-100">
            <div class="card-header pb-0">
                <h6>Data overview</h6>
                <p class="text-sm">
                    <i class="fa fa-arrow-down text-danger" aria-hidden="true"></i>
                    <span class="font-weight-bold">Data Temp-Right</span> dibawah atau diatas ambang batas
                </p>
            </div>
            <div class="card-body p-3">
                <div class="timeline timeline-one-side" style="overflow-y: scroll; max-height: 300px;" id="damang2">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tautan untuk mengunduh file CSV -->
<div class="text-center">
    <a href="<?= base_url('user/downloadCSV') ?>" class="btn btn-primary">Unduh CSV</a>
</div>



<script src="/assets/js/plugins/chartjs.min.js"></script>


<script>
    $(document).ready(function() {
        const getData = () => {
            $.ajax({
                url: "<?= base_url('user/getData') ?>",
                type: "GET",
                success: function(response) {
                    console.log(response);
                    document.getElementById('total').innerHTML = response.total
                    document.getElementById('modeleft').innerHTML = response.modeleft.L6_HSM1_TEMP_LEFT
                    document.getElementById('moderight').innerHTML = response.moderight.L6_HSM1_TEMP_RIGHT
                    document.getElementById('datatoday').innerHTML = response.datatoday
                    const temperatureContent = document.getElementById('damang')
                    let content = ''
                    response.temperatureData.map((item) => {
                        content += `
                    
                    <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-danger text-gradient">notifications</i>
                            </span>
                            <div class="timeline-content">
                        <div class="timeline-item-body">
                            <h6 class="timeline-item-title">${item.waktu}</h6>
                            <p class="timeline-item-text">${item.L6_HSM1_TEMP_LEFT}°C</p>
                        </div>
                        </div>
                    </div>
                    `
                    })


                    //////////////////// data2
                    const temperatureContent2 = document.getElementById('damang2')
                    let content2 = ''
                    response.temperatureData2.map((item2) => {
                        content2 += `
                    
                    <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-danger text-gradient">notifications</i>
                            </span>
                            <div class="timeline-content">
                        <div class="timeline-item-body">
                            <h6 class="timeline-item-title">${item2.waktu}</h6>
                            <p class="timeline-item-text">${item2.L6_HSM1_TEMP_RIGHT}°C</p>
                        </div>
                        </div>
                    </div>
                    `
                    })


                    temperatureContent.innerHTML = content
                    temperatureContent2.innerHTML = content2

                },
                error: function(response) {
                    console.log(response);
                    console.log("error")
                }


            })
        }
        getData()
        setInterval(function() {
            getData();
        }, 15000); // 10 detik dalam milidetik
    })
</script>


<script>
    var myChart1; // Variabel untuk menyimpan objek grafik pertama
    var myChart2; // Variabel untuk menyimpan objek grafik kedua

    // Fungsi untuk membuat grafik
    function createChart(data, upperLimit, lowerLimit, canvasId) {
        var labels = data.map(entry => entry.waktu);
        // Ubah label menjadi hanya bagian waktu (tanpa tanggal)
        labels = labels.map(function(label) {
            return label.split(' ')[1]; // Mengambil bagian waktu saja
        });
        var dataset = data.map(entry => entry.L6_HSM1_TEMP_LEFT);

        // Tampilkan data grafik menggunakan Chart.js
        var ctx = document.getElementById(canvasId).getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Temp Left',
                    data: dataset,
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    maxBarThickness: 6
                }, {
                    label: 'Upper Limit',
                    data: new Array(labels.length).fill(upperLimit), // Array berisi 420 sepanjang data
                    borderColor: "rgba(255, 0, 0, .8)",
                    borderWidth: 2,
                    fill: false,
                    pointRadius: 0,
                    tension: 0
                }, {
                    label: 'Lower Limit',
                    data: new Array(labels.length).fill(lowerLimit), // Array berisi 380 sepanjang data
                    borderColor: "rgba(0, 255, 0, .8)",
                    borderWidth: 2,
                    fill: false,
                    pointRadius: 0,
                    tension: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            }
        });

        return chart; // Mengembalikan objek chart yang baru dibuat
    }

    // Fungsi untuk menghancurkan grafik sebelumnya
    function destroyChart(chartInstance) {
        if (chartInstance) {
            chartInstance.destroy();
        }
    }

    setInterval(function() {
        fetch('user/getData') // Ganti '/getData' dengan rute yang sesuai dengan controller Anda
            .then(response => response.json())
            .then(data => {
                var upperLimit = data.upperLimit;
                var lowerLimit = data.lowerLimit;

                // Ambil 20 data terakhir
                var lastTwentyData = data.result.slice(-20);

                // Hancurkan grafik sebelumnya sebelum membuat yang baru
                destroyChart(myChart1);
                destroyChart(myChart2);

                // Buat grafik pertama
                myChart1 = createChart(lastTwentyData, upperLimit, lowerLimit, 'myChart1');

                // Buat grafik kedua
                myChart2 = createChart(lastTwentyData, upperLimit, lowerLimit, 'myChart2');
            });
    }, 15000); // Mengambil data setiap 5 detik
</script>


<?= $this->endSection() ?>