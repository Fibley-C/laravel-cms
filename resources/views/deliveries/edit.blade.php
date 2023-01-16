<!DOCTYPE html>
<html lang="en">
<x-head />
<body class="w3-light-grey">
    <x-navigation />

    <main>
        <section class="w3-padding">
            <h2>Edit Delivery</h2>

            <form method="post" action="/console/deliveries/edit/{{ $delivery->id }}" novalidate class="w3-margin-bottom">
                @csrf

                <div class="w3-margin-bottom">
                    <label class="w3-text-blue-grey" for="number">Number: </label>
                    <input class="w3-input w3-border w3-animate-input" style="width:50%" type="text" name="number" id="number" 
                        required value="{{ old('number', $delivery->number) }}">
                    @if($errors->first('number'))
                        <br>
                        <span class="w3-text-red"> {{ $errors->first('number') }}</span>
                    @endif
                </div>
                <div class="w3-margin-bottom">
                    <label class="w3-text-blue-grey" for="destination">Destination: </label>
                    <input class="w3-input w3-border w3-animate-input" style="width:50%" type="text" name="destination" id="destination" 
                        required value="{{ old('address', $delivery->destination) }}">
                    @if($errors->first('destination'))
                        <br>
                        <span class="w3-text-red"> {{ $errors->first('destination') }}</span>
                    @endif
                </div>
                <div class="w3-margin-bottom">
                    <label class="w3-text-blue-grey" for="company_id">Company: </label>
                    <br>
                    <select class="w3-select w3-border w3-animate-input" style="width:50%" name="company_id" id="company_id">
                        <option value="none" disabled>Select</option>
                    @foreach ($company_id as $company)
                        @if ($company->id == $delivery->company_id)
                            <option value="{{ $company->id }}" selected>{{ $company->name }}</option>
                            @continue
                        @endif
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                    </select>
                    @if($errors->first('company_id'))
                        <br>
                        <span class="w3-text-red"> {{ $errors->first('company_id') }}</span>
                    @endif
                </div>

                <button class="w3-btn w3-green w3-margin-bottom" type="submit">Edit company</button>
            </form>

            <a href="/console/deliveries/list">Back to Companies</a>

        </section>
    </main>
</body>
</html>