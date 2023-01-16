<!DOCTYPE html>
<html lang="en">
<x-head />
<body class="w3-light-grey">
    <x-navigation />

    <main>
        <section class="w3-padding">
            <h2>Edit Driver</h2>

            <form method="post" action="/console/drivers/edit/{{ $driver->id }}" novalidate class="w3-margin-bottom">
                @csrf

                <div class="w3-margin-bottom">
                    <label class="w3-text-blue-grey" for="title">Title: </label>
                    <input class="w3-input w3-border w3-animate-input" style="width:50%" type="text" name="title" id="title" 
                        required value="{{ old('title', $driver->title) }}">
                    @if($errors->first('title'))
                        <br>
                        <span class="w3-text-red"> {{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="w3-margin-bottom">
                    <label class="w3-text-blue-grey" for="first">First Name: </label>
                    <input class="w3-input w3-border w3-animate-input" style="width:50%" type="text" name="first" id="first" 
                        required value="{{ old('first', $driver->first) }}">
                    @if($errors->first('first'))
                        <br>
                        <span class="w3-text-red"> {{ $errors->first('first') }}</span>
                    @endif
                </div>
                <div class="w3-margin-bottom">
                    <label class="w3-text-blue-grey" for="last">Surname: </label>
                    <input class="w3-input w3-border w3-animate-input" style="width:50%" type="text" name="last" id="last" 
                        required value="{{ old('last', $driver->last) }}">
                    @if($errors->first('last'))
                        <br>
                        <span class="w3-text-red"> {{ $errors->first('last') }}</span>
                    @endif
                </div>
                <div class="w3-margin-bottom">
                    <label class="w3-text-blue-grey" for="vehicle">Vehicle: </label>
                    <input class="w3-input w3-border w3-animate-input" style="width:50%" type="text" name="vehicle" id="vehicle" 
                        required value="{{ old('vehicle', $driver->vehicle) }}">
                    @if($errors->first('vehicle'))
                        <br>
                        <span class="w3-text-red"> {{ $errors->first('vehicle') }}</span>
                    @endif
                </div>

                <button class="w3-btn w3-green w3-margin-bottom" type="submit">Edit Driver</button>
            </form>

            <a href="/console/drivers/list">Back to Drivers</a>

        </section>
    </main>
</body>
</html>