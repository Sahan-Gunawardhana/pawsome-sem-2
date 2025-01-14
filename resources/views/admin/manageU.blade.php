@extends('layouts.sidebar')
@section('content')

<h2 class="px-2 text-4xl font-semibold text-gray-800 py-14">Manager Users</h2>
<div
    class="relative flex flex-col w-full h-full px-2 text-white bg-white rounded-lg shadow-md poverflow-scroll bg-clip-border">
    <table class="w-full overflow-auto text-left rounded-lg" id="users-table">
        <thead class="text-lg bg-gray-800 rounded-t-lg">
            <tr class="text-lg text-left">
                <th class="p-4 border-b border-white bg-blue-gray-50">
                    #
                </th>
                <th class="p-4 border-b border-white bg-blue-gray-50">
                    Name
                </th>
                <th class="p-4 border-b border-white bg-blue-gray-50">
                    E-mail
                </th>
                <th class="p-4 border-b border-white bg-blue-gray-50">
                    Registered On
                </th>
                <th class="p-4 border-b border-white bg-blue-gray-50">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody id="users-container">
            <tr class="even:bg-blue-gray-50/50">
                <td colspan="5" class="py-6 text-center text-white bg-teal-600">
                    Loading...
                </td>
            </tr>
        </tbody>
    </table>
</div>
<script>
    const token = localStorage.getItem('authToken');
    let url = "http://127.0.0.1:8000/api/users";
    document.addEventListener('DOMContentLoaded', function(){
        
        axios.get(url, {
            headers: {
                Authorization: `Bearer ${token}`
            }
        })
        .then(response => {
            const users = response.data.data;
            const usersContainer = document.getElementById('users-container');

            usersContainer.innerHTML = users.map((users, index) => `
                <tr class="bg-teal-600 border-b border-gray-200 hover:bg-teal-800">
                    <td class="px-4 py-3 font-medium text-white border-r text-normal">${index + 1}</td>
                    <td class="px-4 py-3 font-medium text-white border-r text-normal">${users.name}</td>
                    <td class="px-4 py-3 font-medium text-white border-r text-normal">${users.email}</td>
                    <td class="px-4 py-3 font-medium text-white border-r text-normal">${users.created_at}</td>
                    <td class="px-4">
                        <button onclick="deleteUser(${users.id})" class="text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed" stroke="#000" stroke-width="2">
                                <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
                            </svg>
                        </button>
                    </td> 
                </tr>
            `).join('');
        })
        .catch(error=> {
            console.error(error);
        });
    });

    function deleteUser(userId){
        if(confirm("Are you sure you want to delete this user, this action is irrervesible")){
            axios.delete(`${url}/${userId}`, {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            })
            .then(response => {
                alert("User deleted successfully!");
                location.reload();
            })
            .catch(error => {
                console.log(error);
                alert('Failed to delete user');
            })
        }
    }
</script>

@endsection