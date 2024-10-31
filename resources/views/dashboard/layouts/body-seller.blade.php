    <div class="main">
      <div class="main-content">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="mt-4">Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm m-4 btn-outline-secondary">{{ date('l, d F Y') }}</button>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row my-3">
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">My Products</h5>
                  <p class="card-text">Total number of my products: {{$products->where('seller_id', auth()->user()->id)->count()}}</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">My Sales</h5>
                  <p class="card-text">Total sales: {{ number_format($mySales, 2) }}</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">My Revenue</h5>
                  <p class="card-text">Total revenue: ${{ number_format($myRevenue, 2) }}</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Chart Section -->
          <div class="row my-3">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Sales Overview</h5>
                  <canvas id="salesChart">

                  </canvas>
                </div>
              </div>
            </div>
          </div>

          <!-- Table Section -->
          <div class="row my-3">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Recent Orders</h5>
                  <table class="table table-hover text-center">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($recentOrders as $order)
                        <tr>
                          <td>{{ $order->id }}</td>
                          <td>{{ $order->product->name }}</td>
                          <td>{{ $order->quantity }}</td>
                          <td>{{ $order->total }}</td>
                          <td>{{ $order->created_at->format('d F Y') }}</td>
                        </tr>
                      @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Another Content Section -->
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Top Selling Products</h5>
                  <ul class="list-group list-group-flush">
                    {{-- Masukkan data dari variabel $topProducts ke sini --}}
                  @foreach ($topSellingProducts as $product)
                      <li class="list-group item">{{$product->name}} - {{$product->sales_count}} sold</li>
                  @endforeach
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Customer Feedback</h5>
                  <p class="card-text">Customer feedback will be displayed here.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- End Main Content -->
    </div>
  </div><!-- End Container Fluid -->

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <!-- Chart.js Script -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: {!! json_encode($salesChartLabels) !!},
        datasets: [{
          label: 'Sales',
          data: {!! json_encode($salesChartData) !!},
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>