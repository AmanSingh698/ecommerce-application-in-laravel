
<div>
    <div>
        <h1>This is admin dashboard.</h1>
    </div>
    <style>
        nav svg{
            height: 20px;
        }

        nav .hidden{
            display: block;
        }
        h1{
            text-align: center;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> All Details
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card-header">
                            <div class="row">
                                <div class="col md-6">
                                    All Details
                                </div>
                                {{-- <div class="col md-6">
                                    <a href="{{route('admin.products.add')}}" class="btn btn-success float-end">Add New Product</a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        {{-- <th>#</th> --}}
                                        <th>Number of Users :</th>
                                        <th>Number of Categories :</th>
                                        <th>Number of Products :</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($customers as $customer )
                                        <tr>
                                            <td>{{$customer->count()}}</td>
                                        </tr>
                                    @endforeach --}}
                                    <tr>
                                        <td><a href="{{route('admin.customer')}}">{{$customers}}</a></td>
                                        <td><a href="{{route('admin.categories')}}">{{$categories}}</a></td>
                                        <td><a href="{{route('admin.products')}}">{{$products}}</a></td>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- {{$products->links()}} --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
