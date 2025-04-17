<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?act=backadmin">Home</a></li>
                    <li class="breadcrumb-item active">Chillies Store</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <section>
        <div class="container-fluid">
           
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo countsp() ?></h3>
                            <p>Số Lượng Sản Phẩm</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="index.php?act=listsp" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo countViewAll(); ?><sup style="font-size: 20px"> view</sup></h3>
                            <p>Lượt Xem</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="index.php?act=totalcmt" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo countuser() ?></h3>
                            <p>Số Người Đăng Ký</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="index.php?act=dskh" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo number_format(tongdt(), 0) ?></h3>
                            <p>Tổng Doanh Thu (VNĐ)</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="index.php?act=tdt" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

       
        <div class="row mt-4">
            <div class="col-md-6">
                <canvas id="orderChart"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        fetch('get_stats.php')
            .then(response => response.json())
            .then(data => {
                if (!data || typeof data !== 'object') {
                    throw new Error("Dữ liệu nhận được không hợp lệ");
                }

              
                const ctx1 = document.getElementById('orderChart').getContext('2d');
                new Chart(ctx1, {
                    type: 'bar',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Số đơn hàng',
                            data: data.orders,
                            backgroundColor: 'rgba(54, 162, 235, 0.6)'
                        }]
                    }
                });

                
                const ctx2 = document.getElementById('revenueChart').getContext('2d');
                new Chart(ctx2, {
                    type: 'line',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Doanh thu',
                            data: data.revenue,
                            backgroundColor: 'rgba(255, 99, 132, 0.6)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            fill: true
                        }]
                    }
                });
            })
            .catch(error => console.error("Lỗi khi tải dữ liệu:", error.message));
    });
</script>