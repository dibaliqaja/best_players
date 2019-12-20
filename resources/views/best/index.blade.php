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
            background-repeat: no-repeat;
            height: 100%;
            background-size: auto;
        }
        th, tr, td {
            text-align: center;
        }
        #logo {
            float: right;
            height: 70px;
            width: 215px;
            margin-top: 12px;
        }
        #dies {
            float: right;
            height: 95px;
            width: 185px;
            margin-top: 0px;
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
            <div class="col">
            <img id="dies" src="/images/dies.png" alt="background">
            <img id="logo" src="/images/Logo.png" alt="background">
                <br><br><br><br><br>
                <p class="h1 font-weight-bold text-md-right text-light">The Best Mobile Legends Player</p>
                <br><br><br><br><br>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">
                Add New Player
            </button>
            <!-- Form Search -->
            <form class="form-inline my-2 my-lg-0" method="GET" action="/bestplayer">
                <input class="form-control mr-sm-2" name="cari" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                &nbsp;
                <a href="/bestplayer" class="btn btn-outline-success my-2 my-sm-0">Reload Page</a>
            </form>
            <!-- Modal Add -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <input type="text" name="point" class="form-control" id="point" placeholder="Point" value="0" readonly>
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
            <!-- Modal Edit -->
            <div class="modal fade" id="edModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Point</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body">
                        <form action="/bestplayer/update" method="POST">
                            {{ method_field('post')}}
                            {{ csrf_field() }}
                            <input type="hidden" name="bestid" id="bestid">
                            <div class="form-group">
                                <label for="nickname">Nickname</label>
                                <input type="text" name="nickname" class="form-control" id="nickname" placeholder="Nickname" readonly>
                                <small class="form-text text-muted">Nickname Player</small>
                            </div>
                            <div class="form-group">
                                <label for="point">Point</label>
                                <input type="text" name="point" class="form-control" id="point" placeholder="Point">
                                <small class="form-text text-primary">Point yang akan di Update</small>
                            </div>
                            <div class="form-group">
                                <label for="newpoint1">Old Point</label>
                                <input type="text" name="newpoint1" class="form-control" id="newpoint1" placeholder="Point Lama">
                                <small class="form-text text-danger">Form input ini hanya untuk menghitung point (Masukkan Point Lama)</small>
                            </div>
                            <div class="form-group">
                                <label for="newpoint2">New Point</label>
                                <input type="text" name="newpoint2" class="form-control" id="newpoint2" placeholder="Point Baru">
                                <small class="form-text text-danger">Form input ini hanya untuk menghitung point (Masukkan Point Baru)</small>
                            </div>
                            <div class="form-group">
                                <label for="topoint">Total Point</label>
                                <input type="text" name="topoint" class="form-control" id="topoint"  placeholder="Total Point">
                                <small class="form-text text-danger">Total Point Adalah Hasil Penjumlahan dari Point Lama dan Point Baru</small>
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
                            <th>Add Point</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        @foreach ($data_best as $best)
                        <?php $no++; ?>
                            <tr>
                                <th scope="row">{{ $no }}</th>
                                <td><button class="btn btn-warning">{{ $best->nickname }}</button></td>
                                <td><button class="btn btn-light">{{ floor($best->point) }}</button></td>
                                <td><button class="btn btn-info addpointbtn" data-bestid="{{$best->id}}" data-nick="{{$best->nickname}}" data-point="{{floor($best->point)}}" data-toggle="modal" data-target="#edModal">Add Point</button></td>
                                <td><a href="/bestplayer/{{ $best->id }}/delete" class="btn btn-danger" onclick="return confirm('Yakin?')">Delete</a></td>
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
    <script>
        $('#edModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var nickname = button.data('nick');
            var point = button.data('point');
            var bestid = button.data('bestid');

            var modal = $(this);
            modal.find('.modal-body #nickname').val(nickname);
            modal.find('.modal-body #point').val(point);
            modal.find('.modal-body #bestid').val(bestid);
        });

        $(document).ready(function() {
            $("#newpoint1, #newpoint2").keyup(function() {
                var po  = $("#newpoint1").val();
                var newpo = $("#newpoint2").val();
                var total = Number(po) + Number(newpo);
                $("#topoint").val(total);
            });
        });
    </script>
  </body>
</html>
