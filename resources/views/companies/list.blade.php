<!DOCTYPE html>
<html lang="en">
<x-head />
<body class="w3-light-grey">
    <x-navigation />

    <main>
        @if(session()->has('message'))
            <div class="w3-padding w3-margin-top w3-margin-bottom">
                <div class="w3-green w3-center w3-padding">
                    {{ session()->get('message') }}
                </div>
            </div>
        @endif

        <section class="w3-padding">
            <h2>Manage Companies</h2>

            <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
                <tr class="w3-blue">
                    <th></th>
                    <th>Name</th>
                    <th>Address</th>
                    <th></th>
                    <th></th>
                </tr>

                @foreach($companies as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->address }}</td>
                        <td><a href="/console/companies/edit/{{ $value->id }}">Edit</a></td>
                        <td><a href="/console/companies/delete/{{ $value->id }}">Delete</a></td>
                    </tr>
                @endforeach
            </table>
            <a href="/console/companies/add" class="w3-button w3-green">New Company</a>
        </section>
    </main>
</body>
</html>