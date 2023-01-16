<!DOCTYPE html>
<html lang="en">
<x-head />
<body class="w3-light-grey">
    <x-navigation />

    <main>
        <section class="w3-padding">
            <h2>Edit Company</h2>

            <form method="post" action="/console/companies/edit/{{ $company->id }}" novalidate class="w3-margin-bottom">
                @csrf

                <div class="w3-margin-bottom">
                    <label class="w3-text-blue-grey" for="name">Name: </label>
                    <input class="w3-input w3-border w3-animate-input" style="width:50%" type="text" name="name" id="name" 
                        required value="{{ old('name', $company->name) }}">
                    @if($errors->first('name'))
                        <br>
                        <span class="w3-text-red"> {{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="w3-margin-bottom">
                    <label class="w3-text-blue-grey" for="address">Address: </label>
                    <input class="w3-input w3-border w3-animate-input" style="width:50%" type="text" name="address" id="address" 
                        required value="{{ old('address', $company->address) }}">
                    @if($errors->first('address'))
                        <br>
                        <span class="w3-text-red"> {{ $errors->first('address') }}</span>
                    @endif
                </div>

                <button class="w3-btn w3-green w3-margin-bottom" type="submit">Edit Company</button>
            </form>

            <a href="/console/companies/list">Back to Companies</a>

        </section>
    </main>
</body>
</html>