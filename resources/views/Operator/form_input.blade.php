<x-app-layout title="Form Input Operator">
    <x-slot name="heading">
        Form Input Operator
    </x-slot>

    <x-form.form-container method="POST" action="{{ route('operator.post') }}">
        <x-form.form-input
            name="nama_lengkap"
            label="Nama Lengkap"
            type="text"
            placeholder="Masukkan Nama Lengkap"
            required/>
        <x-form.form-input
            name="username"
            label="Username"
            type="text"
            placeholder="Masukkan Username"
            required/>
        <x-form.form-input
            name="password"
            label="Password"
            type="password"
            placeholder="Masukkan Password"
            required/>

        <x-slot name="buttons">
            <a href="{{ route('operator.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Kembali</a>
            <x-form.form-button type="submit">Simpan Operator</x-form.form-button>
        </x-slot>
    </x-form.form-container>


</x-app-layout>

