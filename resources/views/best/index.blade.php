<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>The Best Player</title>
    <style>
        body {
            background-image: url("/images/background.jpg");
            background-position: center relative;
            background-repeat: repeat-y;
            background-size: cover;
        }
        th, tr, td {
            text-align: center;
        }
    </style>
  </head>
  <body>
    <br>
    <br>
    <div class="container">
        @if(session('sukses'))
            <script>
                alert("Sukses");
            </script>
        @endif
        <div class="row">
            {{-- <img src="/images/background.jpg" class="img-fluid big" alt="background" style="fixed">  --}}
            <div class="col">
                <br><br><br><br><br>
                <p class="h1 font-weight-bold text-md-right text-light">The Best Mobile Legends Player</p>
                <br><br><br><br><br>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                Add New Player
            </button>
            <!-- Form Search -->
            <form class="form-inline my-2 my-lg-0" method="GET" action="/bestplayer">
                <input class="form-control mr-sm-2" name="cari" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Player</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body">
                        <form action="/bestplayer/create" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nickname">Nickname</label>
                                <input type="text" name="nickname" class="form-control" id="nickname" placeholder="Nickname" required>
                            </div>
                            <div class="form-group">
                                <label for="point">Point</label>
                                <input type="text" name="point" class="form-control" id="point" placeholder="Point" required>
                            </div>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="sub" class="btn btn-primary">Save</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
                <div class="table-responsive">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nickname</th>
                            <th>Points</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        @foreach ($data_best as $best)
                        <?php $no++; ?>
                            <tr>
                                <th scope="row">{{ $no }}</th>
                                <td>{{ $best->nickname }}</td>
                                <td>{{ $best->point }}</td>
                                <td><a href="#" class="btn btn-info">Add Point</a></td>
                            </tr>
                        @endforeach
                    </tbody>    
                </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>