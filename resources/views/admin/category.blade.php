<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style type="text/css">
        input[type='text'] {
            width: 400px;
            height: 50px;
        }

        .div_design {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }

        .table_deg {
            text-align: center;
            margin: 50px auto auto auto;
            border: 2px solid yellowgreen;
            border-radius: 4px;
            width: 600px;
        }

        th {
            background-color: skyblue;
            padding: 15px 60px;
            font-size: 20px;
            font-weight: bold;
            color: white;
        }

        td {
            color: white;
            padding: 10px;
            border: 1px solid skyblue;
        }
    </style>
</head>
<body>
@include('admin.header')
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 style="color: white;">Add Category</h1>

                <div class="div_design">
                    <form action="{{url('add_category')}}" method="post">
                        @csrf
                        <div>
                            <input type="text" name="category" class="">
                            <input type="submit" class="btn btn-primary" value="Add Category">
                        </div>
                    </form>
                </div>

                <div>
                    <table class="table_deg">
                        <tr>
                            <th>Category Name</th>
                            <th colspan="2">Action</th>
                        </tr>
                        @foreach($data as $row)
                            <tr>
                                <td>{{$row->category_name}}</td>
                                <td>
                                    <a href="{{url('edit_category', $row->id)}}" class="btn btn-success">Edit</a>
                                </td>
                                <td>
                                    <a href="{{url('delete_category', $row->id)}}" class="btn btn-danger"
                                       onclick="confirmation(event)">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- JavaScript files-->
<script type="text/javascript">
    function confirmation(ev) {
        ev.preventDefault();
        let urlToRedirect = ev.currentTarget.getAttribute('href');
        // console.log(urlToRedirect);

        swal({
            title: "Are You Sure to Delete this",
            text: "This delete will be Permanent",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willCancel) => {
                if (willCancel) {
                    window.location.href = urlToRedirect;
                }
            });
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{asset('adminpage/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('adminpage/vendor/popper.js/umd/popper.min.js')}}"></script>
<script src="{{asset('adminpage/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('adminpage/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
<script src="{{asset('adminpage/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('adminpage/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('adminpage/js/charts-home.js')}}"></script>
<script src="{{asset('adminpage/js/front.js')}}"></script>

</body>
</html>
