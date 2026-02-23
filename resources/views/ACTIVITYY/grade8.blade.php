<x-myapplayout>
    @if (Auth::user()->hasRole('admin'))

        @if (session('success'))
            <x-sweetalert type="success" :message="session('success')" />
        @endif

        @if (session('info'))
            <x-sweetalert type="info" :message="session('info')" />
        @endif

        @if (session('error'))
            <x-sweetalert type="error" :message="session('error')" />
        @endif

        <div class="flex justify-center mx-auto mt-10">
            <h1 class="text-4xl font-bold text-blue-600 mt-5">Welcome, {{ Auth::user()->name }}</h1>
        </div>
        <div class="px-3">
            <a href="{{ route('admin.Dashboarding') }}"class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded hover:bg-blue-700"><i class="fa-solid fa-arrow-left"></i> Back</a>
        </div>

        <div class="text-center mt-5 mb-5">
            <h1 class="text-2xl font-semibold text-gray-700">Grade 8 Student List</h1>

            <div x-data="{ open: false }">
                @if ($grades->isEmpty())
                    <button class="mb-4 mt-2 bg-blue-600 text-white text-sm px-4 py-2 rounded-xl hover:bg-blue-700 transition duration-300">
                        <i class="fa-solid fa-plus fa-xs"></i>&nbsp;Add Student
                    </button>
                @else
                    <button @click="open = true"
                        class="mb-4 mt-2 bg-blue-600 text-white text-sm px-4 py-2 rounded-xl hover:bg-blue-700 transition duration-300">
                        <i class="fa-solid fa-plus fa-xs"></i>&nbsp;Add Student
                    </button>
                @endif

                <div x-show="open"
                    class="fixed mx-auto p-8 inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                    <div @click.away="open = true"
                        class="border border-black bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">
                        <div class="flex justify-between">
                            <p class="font-bold">Student</p>
                            <button @click = "open = false">X</button>
                        </div>
                        <hr class="my-4 w-full border border-black">
                        <form action="{{ route('admin.add_Student') }}" method="POST" class="mt-5">
                            @csrf
                            {{-- <div>
                                <label for="grade_id" class="flex justify-start">grade Name:</label>
                                <select name="grade_id" id="grade_id">
                                    @if ($grades->isEmpty())
                                        <option value="">No Student listed</option>
                                    @else
                                        @foreach ($grades as $grade)
                                            <option{{ $grade->id }}">{{ $grade->grade_level }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div> --}}
                            <div class="mb-2">

                                <input type="hidden" name="grade_id" id="grade_id" value="30" readonly>

                            </div>
                            <div>
                                <label for="student_familyname" class="flex justify-start">Family Name:</label>
                                <input type="text" id="student_familyname" name="student_familyname"
                                    class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('grade_level') is-invalid @enderror"
                                    required>
                            </div>
                            <div>
                                <label for="student_firstname" class="flex justify-start">First Name:</label>
                                <input type="text" id="student_firstname" name="student_firstname"
                                    class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('grade_adviser') is-invalid @enderror"
                                    required>
                            </div>
                            <button type="submit"
                                class="w-full bg-blue-500 mt-5 mb-5 text-white rounded-md text-center py-2 px-2 hover:bg-blue-800">ADD
                                STUDENT
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto mt-5 max-w-3xl mx-auto">
                <table class="table-auto w-full border-collapse mx-auto bg-white shadow-lg rounded-lg text-center">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-center text-gray-600 font-semibold text-base">ID</th>
                            <th class="py-2 px-4 border-b text-center text-gray-600 font-semibold text-base">Family Name</th>
                            <th class="py-2 px-4 border-b text-center text-gray-600 font-semibold text-base">First Name</th>
                            <th class="py-2 px-4 border-b text-center text-gray-600 font-semibold text-base">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $filteredestudents = $estudents->filter(function($Student) {
                                return $Student->grade->grade_level === 'Grade 8';
                            });
                        @endphp

                        @if ($filteredestudents->isEmpty())
                            <tr>
                                <td colspan="4" class="py-3 px-4 text-center text-gray-500 text-sm">No students available</td>
                            </tr>
                        @else
                            @foreach ($filteredestudents as $Student)
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 px-4 border-b text-gray-700 text-base">{{ $Student->id }}</td>
                                    <td class="py-2 px-4 border-b text-gray-700 text-base">{{ $Student->student_familyname }}</td>
                                    <td class="py-2 px-4 border-b text-gray-700 text-base">{{ $Student->student_firstname }}</td>
                                    <td class="py-2 px-4 border-b flex space-x-3">
                                        {{-- start of edit --}}
                                        <div class="flex justify-center">
                                            <div x-data="{ open: false }">
                                                <button @click="open = true"
                                                    class="mb-4 mt-2 bg-blue-500 text-white text-sm px-3 py-2 rounded hover:bg-blue-700">
                                                    <i class="fa-regular fa-pen-to-square"></i>&nbsp;Edit
                                                </button>
                                                <div x-show="open"
                                                    class="fixed mx-auto p-8 inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                                                    <div @click.away="open = false"
                                                        class="border border-black bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">
                                                        <div class="flex justify-between">
                                                            <p class="font-bold">Edit Student</p>
                                                            <button @click="open = false">X</button>
                                                        </div>
                                                        <hr class="my-4 w-full border border-black">
                                                        <form action="{{ route('admin.update_Student', $Student->id) }}" method="POST" class="mt-5">
                                                            @csrf
                                                            @method('PUT')
                                                            <div>
                                                                <label for="student_familyname" class="flex justify-start">Family Name:</label>
                                                                <input type="text" id="student_familyname" name="student_familyname"
                                                                    value="{{ $Student->student_familyname }}"
                                                                    class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('student_familyname') is-invalid @enderror"
                                                                    required>
                                                            </div>
                                                            <div>
                                                                <label for="student_familyname" class="flex justify-start">First Name:</label>
                                                                <input type="text" id="student_firstname" name="student_firstname"
                                                                    value="{{ $Student->student_firstname }}"
                                                                    class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('student_firstname') is-invalid @enderror"
                                                                    required>
                                                            </div>
                                                            <button type="submit"
                                                                class="w-full bg-blue-500 mt-5 mb-5 text-white rounded-md text-center py-2 px-2 hover:bg-blue-800">
                                                                Save Changes
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end of edit | start of delete --}}
                                        <div x-data="{ open: false }">
                                            <button @click= "open = true"
                                                class="mb-4 mt-2 bg-red-500 text-white text-sm px-3 py-2 rounded hover:bg-red-700">
                                                <i class="fa-solid fa-trash-can" class="text-white"></i>&nbsp;Delete
                                            </button>
                                            <div x-show="open"
                                                class="fixed mx-auto p-8 inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                                                <div @click.away="open = true"
                                                    class="border border-black bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">
                                                    <div class="flex justify-between">
                                                        <p class="font-bold">Delete Student</p>
                                                        <button @click = "open = false">X</button>
                                                    </div>
                                                    <hr class="my-4 w-full border border-black">
                                                    <form action="{{ route('admin.delete_Student', $Student->id) }}" method="POST"
                                                        class="mt-5">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div>
                                                            <label for="student_familyname" class="flex justify-start">Family Name:</label>
                                                            <input type="text" id="student_familyname" name="student_familyname" value="{{$Student->student_familyname}}"
                                                                class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('student_familyname') is-invalid @enderror"
                                                                required readonly>
                                                        </div>
                                                        <div>
                                                            <label for="student_firstname"
                                                                class="flex justify-start">First Name:</label>
                                                            <input type="text" id="student_firstname"
                                                                name="student_firstname"
                                                                value="{{$Student->student_firstname}}"
                                                                class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('student_firstname') is-invalid @enderror"
                                                                required readonly>
                                                        </div>
                                                        <button type="submit"
                                                            class="w-full bg-blue-500 mt-5 mb-5 text-white rounded-md text-center py-2 px-2 hover:bg-blue-800">Delete
                                                            </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        @elseif(Auth::user()->hasRole('teacher'))
        @if (session('success'))
            <x-sweetalert type="success" :message="session('success')" />
        @endif

        @if (session('info'))
            <x-sweetalert type="info" :message="session('info')" />
        @endif

        @if (session('error'))
            <x-sweetalert type="error" :message="session('error')" />
        @endif

        <div class="flex justify-center mx-auto mt-10">
            <h1 class="text-4xl font-bold text-blue-600 mt-5">Welcome, {{ Auth::user()->name }}</h1>
        </div>
        <div class="px-3">
            <a
                href="{{ route('teacher.Dashboarding') }}"class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded hover:bg-blue-700"><i
                    class="fa-solid fa-arrow-left"></i> Back</a>
        </div>

        <div class="text-center mt-5 mb-5">
            <h1 class="text-2xl font-semibold text-gray-700">Grade 8 Student List</h1>

            <div x-data="{ open: false }">
                @if ($grades->isEmpty())
                    <button
                        class="mb-4 mt-2 bg-gray-600 text-white text-sm px-4 py-2 rounded-xl hover:bg-blue-700 transition duration-300">
                        <i class="fa-solid fa-plus fa-xs"></i>&nbsp;Add Student
                    </button>
                @else
                    <button @click="open = true"
                        class="mb-4 mt-2 bg-blue-600 text-white text-sm px-4 py-2 rounded-xl hover:bg-blue-700 transition duration-300">
                        <i class="fa-solid fa-plus fa-xs"></i>&nbsp;Add Student
                    </button>
                @endif

                <div x-show="open"
                    class="fixed mx-auto p-8 inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                    <div @click.away="open = true"
                        class="border border-black bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">
                        <div class="flex justify-between">
                            <p class="font-bold">Student</p>
                            <button @click = "open = false">X</button>
                        </div>
                        <hr class="my-4 w-full border border-black">
                        <form action="{{ route('teacher.add_Student') }}" method="POST" class="mt-5">
                            @csrf
                            {{-- <div>
                        <label for="grade_id" class="flex justify-start">grade Name:</label>
                        <select name="grade_id" id="grade_id">
                            @if ($grades->isEmpty())
                                <option value="">No Student listed</option>
                            @else
                                @foreach ($grades as $grade)
                                    <option{{ $grade->id }}">{{ $grade->grade_level }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div> --}}
                            <div class="mb-2">

                                <input type="hidden" name="grade_id" id="grade_id" value="30" readonly>

                            </div>
                            <div>
                                <label for="student_familyname" class="flex justify-start">Family Name:</label>
                                <input type="text" id="student_familyname" name="student_familyname"
                                    class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('grade_level') is-invalid @enderror"
                                    required>
                            </div>
                            <div>
                                <label for="student_firstname" class="flex justify-start">First Name:</label>
                                <input type="text" id="student_firstname" name="student_firstname"
                                    class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('grade_adviser') is-invalid @enderror"
                                    required>
                            </div>
                            <button type="submit"
                                class="w-full bg-blue-500 mt-5 mb-5 text-white rounded-md text-center py-2 px-2 hover:bg-blue-800">ADD
                                STUDENT
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto mt-5 max-w-3xl mx-auto">
                <table class="table-auto w-full border-collapse mx-auto bg-white shadow-lg rounded-lg text-center">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-center text-gray-600 font-semibold text-base">ID</th>
                            <th class="py-2 px-4 border-b text-center text-gray-600 font-semibold text-base">Family Name
                            </th>
                            <th class="py-2 px-4 border-b text-center text-gray-600 font-semibold text-base">First Name
                            </th>
                            <th class="py-2 px-4 border-b text-center text-gray-600 font-semibold text-base">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $filteredestudents = $estudents->filter(function ($Student) {
                                return $Student->grade->grade_level === 'Grade 8';
                            });
                        @endphp

                        @if ($filteredestudents->isEmpty())
                            <tr>
                                <td colspan="4" class="py-3 px-4 text-center text-gray-500 text-sm">No students
                                    available</td>
                            </tr>
                        @else
                            @foreach ($filteredestudents as $Student)
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 px-4 border-b text-gray-700 text-base">{{ $Student->id }}</td>
                                    <td class="py-2 px-4 border-b text-gray-700 text-base">
                                        {{ $Student->student_familyname }}</td>
                                    <td class="py-2 px-4 border-b text-gray-700 text-base">
                                        {{ $Student->student_firstname }}</td>
                                    <td class="py-2 px-4 border-b flex space-x-3">
                                        {{-- start of edit --}}
                                        <div class="flex justify-center">
                                            <div x-data="{ open: false }">
                                                <button @click="open = true"
                                                    class="mb-4 mt-2 bg-blue-500 text-white text-sm px-3 py-2 rounded hover:bg-blue-700">
                                                    <i class="fa-regular fa-pen-to-square"></i>&nbsp;Edit
                                                </button>
                                                <div x-show="open"
                                                    class="fixed mx-auto p-8 inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                                                    <div @click.away="open = false"
                                                        class="border border-black bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">
                                                        <div class="flex justify-between">
                                                            <p class="font-bold">Edit Student</p>
                                                            <button @click="open = false">X</button>
                                                        </div>
                                                        <hr class="my-4 w-full border border-black">
                                                        <form
                                                            action="{{ route('teacher.update_Student', $Student->id) }}"
                                                            method="POST" class="mt-5">
                                                            @csrf
                                                            @method('PUT')
                                                            <div>
                                                                <label for="student_familyname"
                                                                    class="flex justify-start">Family Name:</label>
                                                                <input type="text" id="student_familyname"
                                                                    name="student_familyname"
                                                                    value="{{ $Student->student_familyname }}"
                                                                    class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('student_familyname') is-invalid @enderror"
                                                                    required>
                                                            </div>
                                                            <div>
                                                                <label for="student_familyname"
                                                                    class="flex justify-start">First Name:</label>
                                                                <input type="text" id="student_firstname"
                                                                    name="student_firstname"
                                                                    value="{{ $Student->student_firstname }}"
                                                                    class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('student_firstname') is-invalid @enderror"
                                                                    required>
                                                            </div>
                                                            <button type="submit"
                                                                class="w-full bg-blue-500 mt-5 mb-5 text-white rounded-md text-center py-2 px-2 hover:bg-blue-800">
                                                                Save Changes
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end of edit | start of delete --}}
                                        <div x-data="{ open: false }">
                                            <button @click= "open = true"
                                                class="mb-4 mt-2 bg-red-500 text-white text-sm px-3 py-2 rounded hover:bg-red-700">
                                                <i class="fa-solid fa-trash-can" class="text-white"></i>&nbsp;Delete
                                            </button>
                                            <div x-show="open"
                                                class="fixed mx-auto p-8 inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                                                <div @click.away="open = true"
                                                    class="border border-black bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">
                                                    <div class="flex justify-between">
                                                        <p class="font-bold">Delete Student</p>
                                                        <button @click = "open = false">X</button>
                                                    </div>
                                                    <hr class="my-4 w-full border border-black">
                                                    <form action="{{ route('teacher.delete_Student', $Student->id) }}"
                                                        method="POST" class="mt-5">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div>
                                                            <label for="student_familyname"
                                                                class="flex justify-start">Family Name:</label>
                                                            <input type="text" id="student_familyname"
                                                                name="student_familyname"
                                                                value="{{ $Student->student_familyname }}"
                                                                class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('student_familyname') is-invalid @enderror"
                                                                required readonly>
                                                        </div>
                                                        <div>
                                                            <label for="student_firstname"
                                                                class="flex justify-start">First Name:</label>
                                                            <input type="text" id="student_firstname"
                                                                name="student_firstname"
                                                                value="{{ $Student->student_firstname }}"
                                                                class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('student_firstname') is-invalid @enderror"
                                                                required readonly>
                                                        </div>
                                                        <button type="submit"
                                                            class="w-full bg-blue-500 mt-5 mb-5 text-white rounded-md text-center py-2 px-2 hover:bg-blue-800">Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end of delete --}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    @else
        @if (session('success'))
            <x-sweetalert type="success" :message="session('success')" />
        @endif

        @if (session('info'))
            <x-sweetalert type="info" :message="session('info')" />
        @endif

        @if (session('error'))
            <x-sweetalert type="error" :message="session('error')" />
        @endif

        <div class="flex justify-center mx-auto mt-10">
            <h1 class="text-4xl font-bold text-blue-600 mt-5">Welcome, {{ Auth::user()->name }}</h1>
        </div>
        <div class="px-3">
            <a
                href="{{ route('student.Dashboarding') }}"class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded hover:bg-blue-700"><i
                    class="fa-solid fa-arrow-left"></i> Back</a>
        </div>

        <div class="text-center mt-5 mb-5">
            <h1 class="text-2xl font-semibold text-gray-700">Grade 8 Student List</h1>






            <div class="overflow-x-auto mt-5 max-w-3xl mx-auto">
                <table class="table-auto w-full border-collapse mx-auto bg-white shadow-lg rounded-lg text-center">
                    <thead class="bg-gray-200 text-gray-800">
                        <tr>
                            <th class="py-2 px-4 border-b text-center text-gray-600 font-semibold text-base">ID</th>
                            <th class="py-2 px-4 border-b text-center text-gray-600 font-semibold text-base">Family Name
                            </th>
                            <th class="py-2 px-4 border-b text-center text-gray-600 font-semibold text-base">First Name
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $filteredestudents = $estudents->filter(function ($Student) {
                                return $Student->grade->grade_level === 'Grade 8';
                            });
                        @endphp

                        @if ($filteredestudents->isEmpty())
                            <tr>
                                <td colspan="4" class="py-3 px-4 text-center text-gray-500 text-sm">No students
                                    available</td>
                            </tr>
                        @else
                            @foreach ($filteredestudents as $Student)
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 px-4 border-b text-gray-700 text-base">{{ $Student->id }}</td>
                                    <td class="py-2 px-4 border-b text-gray-700 text-base">
                                        {{ $Student->student_familyname }}</td>
                                    <td class="py-2 px-4 border-b text-gray-700 text-base">
                                        {{ $Student->student_firstname }}</td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    @endif



</x-myapplayout>
