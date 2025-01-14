@extends('layouts.sidebar')
@section('content')

<h2 class="px-2 text-4xl font-semibold text-gray-800 py-14">Manager Products</h2>
<div
    class="relative flex flex-col w-full h-full px-2 text-white bg-white rounded-lg shadow-md poverflow-scroll bg-clip-border">
    <table class="w-full overflow-auto text-left rounded-lg" id="users-table">
        <thead class="text-lg bg-gray-800 rounded-t-lg">
            <tr class="text-lg text-left">
                <th class="p-4 border-b border-white bg-blue-gray-50">
                    #
                </th>
                <th class="p-4 border-b border-white bg-blue-gray-50">
                    Product Name
                </th>
                <th class="p-4 border-b border-white bg-blue-gray-50">
                    Price
                </th>
                <th class="p-4 border-b border-white bg-blue-gray-50">
                    Category
                </th>
                <th class="p-4 border-b border-white bg-blue-gray-50">
                    Slef Life
                </th>
            </tr>
        </thead>
        <tbody id="users-container">
            {{-- <tr class="even:bg-blue-gray-50/50">
                <td colspan="5" class="py-6 text-center text-black bg-teal-500">
                    Loading
                </td>
            </tr> --}}
        </tbody>
    </table>
</div>
<script>
@endsection