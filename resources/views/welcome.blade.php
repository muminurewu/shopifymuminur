

@extends('shopify-app::layouts.default')

@section('content')


    <h1>Products</h1>
    <table>
        <thead>
            <tr>
                Product
                <th>Price</th>
                <th>Created</th>
            </tr>
        <tbody>
            @foreach ($products as $product)
                    <tr>
                        <td> {{ $product->title }}</td>
                        <td>{{ $product->variants[0]->price }}</td>
                        <td>{{ $product->created_at }}</td>
                    </tr>
        </tbody>

        </thead>
    </table>





@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, { title: 'Welcome' });
    </script>
@endsection


