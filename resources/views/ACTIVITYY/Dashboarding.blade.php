<x-myapplayout>
    @if (Auth::user()->hasRole('admin'))
        <div class="flex w-full min-h-screen">
            <aside class="bg-gradient-to-r from-gray-800 to-gray-700 text-white p-6 w-1/6 flex flex-col">
                <div class="mb-8 text-center">
                    <i class="fa-solid fa-user-tie text-4xl"></i>
                    <h2 class="mt-4 font-bold text-xl">ADMINISTRATOR</h2>
                </div>
                <ul class="space-y-6 flex-grow">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <button
                                    class="w-full text-left py-2 px-4 bg-red-500 rounded-md hover:bg-red-700 transition duration-200">
                                    <i class="fa-solid fa-right-from-bracket"></i>&nbsp; {{ __('Log Out') }}
                                </button>
                            </x-responsive-nav-link>
                        </form>
                    </li>
                </ul>
                <footer class="text-center mt-auto">
                    <p class="text-gray-400 text-xs">&copy; 2024 Cristal e-Highschool</p>
                </footer>
            </aside>

            <main class="w-full p-10 bg-gray-100">
                <header class="text-center mb-10">
                    <h1 class="text-3xl font-bold text-gray-800">Welcome, {{ Auth::user()->name }}</h1>
                    <p class="text-gray-600 mt-2">Cristal e-Highschool Admin Dashboard</p>
                </header>

                @if (session('success'))
                    <x-sweetalert type="success" :message="session('success')" />
                @endif

                @if (session('info'))
                    <x-sweetalert type="info" :message="session('info')" />
                @endif

                @if (session('error'))
                    <x-sweetalert type="error" :message="session('error')" />
                @endif

                <!-- TABLE -->
                <section class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Grade Levels Overview</h2>
                    <div class="overflow-x-auto">
                        <table
                            class="table-auto w-full text-sm text-left border-collapse border border-gray-300 rounded-lg">
                            <thead class="bg-gray-200">
                                <tr class="text-gray-700 text-center">
                                    <th class="py-2 px-4 border border-gray-300">Grade Level</th>
                                    <th class="py-2 px-4 border border-gray-300">Adviser</th>
                                    <th class="py-2 px-4 border border-gray-300">Action</th>
                                    <th class="py-2 px-4 border border-gray-300">Students List</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if ($grades->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center text-gray-500 py-4">No data available</td>
                                    </tr>
                                @else
                                    @foreach ($grades as $grade)
                                        <tr class="hover:bg-gray-100 transition duration-200">
                                            <td class="py-2 px-4 text-center">{{ $grade->grade_level }}</td>
                                            <td class="py-2 px-4 text-center">{{ $grade->grade_adviser }}</td>
                                            <td class="py-2 px-4 text-center">
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
                                                                    <p class="font-bold">Update Adviser</p>
                                                                    <button @click="open = false">X</button>
                                                                </div>
                                                                <hr class="my-4 w-full border border-black">
                                                                <form
                                                                    action="{{ route('admin.update_grade', $grade->id) }}"
                                                                    method="POST" class="mt-5">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div>

                                                                        <input type="text" id="grade_adviser"
                                                                            name="grade_adviser"
                                                                            value="{{ $grade->grade_adviser }}"
                                                                            class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('grade_adviser') is-invalid @enderror"
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

                                            </td>
                                            {{-- Show List Button --}}
                                            <td class="px-1 py-1 text-center">
                                                @if ($grade->id == 29)
                                                    <a href="{{ route('admin.grade7') }}"
                                                        class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 transform hover:scale-105">
                                                        <i class="fa-solid fa-list-ul"></i>&nbsp;Show List
                                                    </a>
                                                @elseif ($grade->id == 30)
                                                    <a href="{{ route('admin.grade8') }}"
                                                        class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 transform hover:scale-105">
                                                        <i class="fa-solid fa-list-ul"></i>&nbsp;Show List
                                                    </a>
                                                @elseif ($grade->id == 31)
                                                    <a href="{{ route('admin.grade9') }}"
                                                        class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 transform hover:scale-105">
                                                        <i class="fa-solid fa-list-ul"></i>&nbsp;Show List
                                                    </a>
                                                @elseif ($grade->id == 32)
                                                    <a href="{{ route('admin.grade10') }}"
                                                        class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 transform hover:scale-105">
                                                        <i class="fa-solid fa-list-ul"></i>&nbsp;Show List
                                                    </a>
                                                @elseif ($grade->id == 33)
                                                    <a href="{{ route('admin.grade11') }}"
                                                        class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 transform hover:scale-105">
                                                        <i class="fa-solid fa-list-ul"></i>&nbsp;Show List
                                                    </a>
                                                @elseif ($grade->id == 34)
                                                    <a href="{{ route('admin.grade12') }}"
                                                        class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 transform hover:scale-105">
                                                        <i class="fa-solid fa-list-ul"></i>&nbsp;Show List
                                                    </a>
                                                @else
                                                    <h1>sakto boss</h1>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </section>
            </main>
        </div>



        {{-- Teacher Start --}}
    @elseif(Auth::user()->hasRole('teacher'))
        <div class="flex w-full min-h-screen">
            <aside class="bg-gradient-to-r from-gray-800 to-gray-700 text-white p-6 w-1/6 flex flex-col">
                <div class="mb-8 text-center">
                    <i class="fa-solid fa-user-tie text-4xl"></i>
                    <h2 class="mt-4 font-bold text-xl">TEACHER</h2>
                </div>
                <ul class="space-y-6 flex-grow">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <button
                                    class="w-full text-left py-2 px-4 bg-red-500 rounded-md hover:bg-red-700 transition duration-200">
                                    <i class="fa-solid fa-right-from-bracket"></i>&nbsp; {{ __('Log Out') }}
                                </button>
                            </x-responsive-nav-link>
                        </form>
                    </li>
                </ul>
                <footer class="text-center mt-auto">
                    <p class="text-gray-400 text-xs">&copy; 2024 Cristal e-Highschool</p>
                </footer>
            </aside>

            <main class="w-full p-10 bg-gray-100">
                <header class="text-center mb-10">
                    <h1 class="text-3xl font-bold text-gray-800">Welcome, {{ Auth::user()->name }}</h1>
                    <p class="text-gray-600 mt-2">Cristal e-Highschool Dashboard</p>
                </header>

                @if (session('success'))
                    <x-sweetalert type="success" :message="session('success')" />
                @endif

                @if (session('info'))
                    <x-sweetalert type="info" :message="session('info')" />
                @endif

                @if (session('error'))
                    <x-sweetalert type="error" :message="session('error')" />
                @endif

                <!-- TABLE -->
                <section class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Grade Levels Overview</h2>
                    <div class="overflow-x-auto">
                        <table
                            class="table-auto w-full text-sm text-left border-collapse border border-gray-300 rounded-lg">
                            <thead class="bg-gray-200">
                                <tr class="text-gray-700 text-center">
                                    <th class="py-2 px-4 border border-gray-300">Grade Level</th>
                                    <th class="py-2 px-4 border border-gray-300">Adviser</th>
                                    {{-- <th class="py-2 px-4 border border-gray-300">Action</th> --}}
                                    <th class="py-2 px-4 border border-gray-300">Students List</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if ($grades->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center text-gray-500 py-4">No data available
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($grades as $grade)
                                        <tr class="hover:bg-gray-100 transition duration-200">
                                            <td class="py-2 px-4 text-center">{{ $grade->grade_level }}</td>
                                            <td class="py-2 px-4 text-center">{{ $grade->grade_adviser }}</td>
                                            {{-- <td class="py-2 px-4 text-center">
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
                                                                    <p class="font-bold">Update Adviser</p>
                                                                    <button @click="open = false">X</button>
                                                                </div>
                                                                <hr class="my-4 w-full border border-black">
                                                                <form
                                                                    action="{{ route('teacher.update_grade2', $grade->id) }}"
                                                                    method="POST" class="mt-5">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div>

                                                                        <input type="text" id="grade_adviser"
                                                                            name="grade_adviser"
                                                                            value="{{ $grade->grade_adviser }}"
                                                                            class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('grade_adviser') is-invalid @enderror"
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

                                            </td> --}}
                                            {{-- Show List Button --}}
                                            <td class="px-1 py-1 text-center">
                                                @if ($grade->id == 29)
                                                    <a href="{{ route('teacher.grade7') }}"
                                                        class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 transform hover:scale-105">
                                                        <i class="fa-solid fa-list-ul"></i>&nbsp;Show List
                                                    </a>
                                                @elseif ($grade->id == 30)
                                                    <a href="{{ route('teacher.grade8') }}"
                                                        class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 transform hover:scale-105">
                                                        <i class="fa-solid fa-list-ul"></i>&nbsp;Show List
                                                    </a>
                                                @elseif ($grade->id == 31)
                                                    <a href="{{ route('teacher.grade9') }}"
                                                        class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 transform hover:scale-105">
                                                        <i class="fa-solid fa-list-ul"></i>&nbsp;Show List
                                                    </a>
                                                @elseif ($grade->id == 32)
                                                    <a href="{{ route('teacher.grade10') }}"
                                                        class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 transform hover:scale-105">
                                                        <i class="fa-solid fa-list-ul"></i>&nbsp;Show List
                                                    </a>
                                                @elseif ($grade->id == 33)
                                                    <a href="{{ route('teacher.grade11') }}"
                                                        class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 transform hover:scale-105">
                                                        <i class="fa-solid fa-list-ul"></i>&nbsp;Show List
                                                    </a>
                                                @elseif ($grade->id == 34)
                                                    <a href="{{ route('teacher.grade12') }}"
                                                        class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 transform hover:scale-105">
                                                        <i class="fa-solid fa-list-ul"></i>&nbsp;Show List
                                                    </a>
                                                @else
                                                    <h1>sakto boss</h1>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </section>
            </main>
        </div>


        {{-- STUDENT START --}}
    @else
        <div class="flex w-full min-h-screen">
            <aside class="bg-gradient-to-r from-gray-800 to-gray-700 text-white p-6 w-1/6 flex flex-col">
                <div class="mb-8 text-center">
                    <i class="fa-solid fa-user-tie text-4xl"></i>
                    <h2 class="mt-4 font-bold text-xl">STUDENT</h2>
                </div>
                <ul class="space-y-6 flex-grow">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <button
                                    class="w-full text-left py-2 px-4 bg-red-500 rounded-md hover:bg-red-700 transition duration-200">
                                    <i class="fa-solid fa-right-from-bracket"></i>&nbsp; {{ __('Log Out') }}
                                </button>
                            </x-responsive-nav-link>
                        </form>
                    </li>
                </ul>
                <footer class="text-center mt-auto">
                    <p class="text-gray-400 text-xs">&copy; 2024 Cristal e-Highschool</p>
                </footer>
            </aside>

            <main class="w-full p-10 bg-gray-100">
                <header class="text-center mb-10">
                    <h1 class="text-3xl font-bold text-gray-800">Welcome, {{ Auth::user()->name }}</h1>
                    <p class="text-gray-600 mt-2">Cristal e-Highschool Dashboard</p>
                </header>

                @if (session('success'))
                    <x-sweetalert type="success" :message="session('success')" />
                @endif

                @if (session('info'))
                    <x-sweetalert type="info" :message="session('info')" />
                @endif

                @if (session('error'))
                    <x-sweetalert type="error" :message="session('error')" />
                @endif

                <!-- TABLE -->
                <section class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Grade Levels Overview</h2>
                    <div class="overflow-x-auto">
                        <table
                            class="table-auto w-full text-sm text-left border-collapse border border-gray-300 rounded-lg">
                            <thead class="bg-gray-200">
                                <tr class="text-gray-700 text-center">
                                    <th class="py-2 px-4 border border-gray-300">Grade Level</th>
                                    <th class="py-2 px-4 border border-gray-300">Adviser</th>
                                    <th class="py-2 px-4 border border-gray-300">Students List</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if ($grades->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center text-gray-500 py-4">No data available
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($grades as $grade)
                                        <tr class="hover:bg-gray-100 transition duration-200">
                                            <td class="py-2 px-4 text-center">{{ $grade->grade_level }}</td>
                                            <td class="py-2 px-4 text-center">{{ $grade->grade_adviser }}</td>

                                            {{-- Show List Button --}}
                                            <td class="px-1 py-1 text-center">
                                                @if ($grade->id == 29)
                                                    <a href="{{ route('student.grade7') }}"
                                                        class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 transform hover:scale-105">
                                                        <i class="fa-solid fa-list-ul"></i>&nbsp;Show List
                                                    </a>
                                                @elseif ($grade->id == 30)
                                                    <a href="{{ route('student.grade8') }}"
                                                        class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 transform hover:scale-105">
                                                        <i class="fa-solid fa-list-ul"></i>&nbsp;Show List
                                                    </a>
                                                @elseif ($grade->id == 31)
                                                    <a href="{{ route('student.grade9') }}"
                                                        class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 transform hover:scale-105">
                                                        <i class="fa-solid fa-list-ul"></i>&nbsp;Show List
                                                    </a>
                                                @elseif ($grade->id == 32)
                                                    <a href="{{ route('student.grade10') }}"
                                                        class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 transform hover:scale-105">
                                                        <i class="fa-solid fa-list-ul"></i>&nbsp;Show List
                                                    </a>
                                                @elseif ($grade->id == 33)
                                                    <a href="{{ route('student.grade11') }}"
                                                        class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 transform hover:scale-105">
                                                        <i class="fa-solid fa-list-ul"></i>&nbsp;Show List
                                                    </a>
                                                @elseif ($grade->id == 34)
                                                    <a href="{{ route('student.grade12') }}"
                                                        class="mb-4 mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 transform hover:scale-105">
                                                        <i class="fa-solid fa-list-ul"></i>&nbsp;Show List
                                                    </a>
                                                @else
                                                    <h1>sakto boss</h1>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </section>
            </main>
        </div>
    @endif
</x-myapplayout>
