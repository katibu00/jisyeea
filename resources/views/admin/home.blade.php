@extends('admin.layout.app')
@section('pageTitle', 'Home')
@section('content')

    <div class="main-content">
        <div class="page-content">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">Dashboard</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Welcome to Jigawa State Youth Empowerment Agency</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Four Cards for Statistics -->
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fas fa-users fa-2x text-primary"></i>
                                <div class="text-right">
                                    <h5 class="card-title">Total Sign Ups</h5>
                                    <p class="card-text">{{ number_format($totalRegularUserCount, 0) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fas fa-user-tie fa-2x text-success"></i>
                                <div class="text-right">
                                    <h5 class="card-title">Total Admins</h5>
                                    <p class="card-text">{{ number_format($totalAdminUserCount, 0) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fas fa-certificate fa-2x text-info"></i>
                                <div class="text-right">
                                    <h5 class="card-title">Total Active Programs</h5>
                                    <p class="card-text">{{ number_format($totalProgramsCount, 0) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="fas fa-newspaper fa-2x text-warning"></i>
                                <div class="text-right">
                                    <h5 class="card-title">Total Blog Articles</h5>
                                    <p class="card-text">{{ number_format($totalBlogCount, 0) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Four Cards -->


            <!-- Two Column Row -->
            <div class="row">
                <!-- Smaller Column -->
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">User Statistics</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Total Sign Ups: {{ number_format($totalRegularUserCount, 0) }}
                                </li>
                                <li class="list-group-item">Total PreRegistrations:
                                    {{ number_format($totalPreRegistrationCount, 0) }}</li>
                                <li class="list-group-item">Without PreRegistrations:
                                    {{ number_format($totalUsersWithoutPreRegistration, 0) }}</li>
                            </ul>
                            <div class="progress mt-3">
                                <div class="progress-bar bg-primary" role="progressbar"
                                    style="width: {{ number_format(($totalPreRegistrationCount / $totalRegularUserCount) * 100, 0) }}%;"
                                    aria-valuenow="{{ number_format(($totalPreRegistrationCount / $totalRegularUserCount) * 100, 0) }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Larger Column (Currently Empty) -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="userSignupsChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Two Column Row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">User Counts by LGA</h5>
                            <div style="height: 300px;">
                                <canvas id="userCountsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Gender Distribution</h5>
                            <div style="height: 300px;">
                                <canvas id="genderPieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Highest Education Distribution</h5>
                            <div style="height: 300px;">
                                <canvas id="educationPieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Preferred Category Distribution</h5>
                            <div style="height: 300px;">
                                <canvas id="categoryPieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    @endsection

    @section('js')
        <!-- Include Chart.js library -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Create a canvas element for the graph -->

        <script>
            // Parse JSON data from PHP
            var dates = JSON.parse(@json($datesJson)); // Use JSON.parse to decode the JSON data
            var userCounts = JSON.parse(@json($userCountsJson));

            // Format the labels as "D j" (e.g., "Tue 2")
            var formattedDates = dates.map(function(date) {
                var formattedDate = new Date(date);
                return formattedDate.toLocaleString('en-US', {
                    weekday: 'short',
                    day: 'numeric'
                });
            });

            // Create a line chart
            var ctx = document.getElementById('userSignupsChart').getContext('2d');
            var userSignupsChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: formattedDates, // Use the formatted dates
                    datasets: [{
                        label: 'User Sign-ups',
                        data: userCounts,
                        borderColor: 'blue',
                        borderWidth: 2,
                        fill: false,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'User Count'
                            }
                        }
                    }
                }
            });
        </script>

        <script>
            var lgasArray = @json($lgasArray);

            // Create arrays for labels and counts
            var labels = [];
            var counts = [];

            lgasArray.forEach(function(lga) {
                labels.push(lga.lga_origin + ' (' + lga.count + ')');
                counts.push(lga.count);
            });

            var ctx = document.getElementById('userCountsChart').getContext('2d');
            var userCountsChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'User Count',
                        data: counts,
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                                text: 'LGA'
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'User Count'
                            }
                        }
                    }
                }
            });
        </script>

<script>
    var categoryData = @json($categoryData);

    var labels = [];
    var data = [];

    categoryData.forEach(function(item) {
        labels.push(item.category_name);
        data.push(item.count);
    });

    var ctx = document.getElementById('categoryPieChart').getContext('2d');
    var categoryPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                ],
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        }
    });
</script>



<script>
    var educationData = @json($educationData);

    var labels = [];
    var data = [];

    educationData.forEach(function(item) {
        labels.push(item.highest_education);
        data.push(item.count);
    });

    var ctx = document.getElementById('educationPieChart').getContext('2d');
    var educationPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                ],
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        }
    });
</script>


<script>
    var genderData = @json($genderData);

    // Create arrays for labels and data
    var labels = [];
    var data = [];

    genderData.forEach(function(item) {
        labels.push(item.gender);
        data.push(item.count);
    });

    var ctx = document.getElementById('genderPieChart').getContext('2d');
    var genderPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                ],
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        }
    });
</script>









    @endsection
