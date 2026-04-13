@extends('layout')

@section('content')
    <main class="flex-1 overflow-y-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-6">

            <!-- Page header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">Services Ticket</h1>
                    <p class="text-sm text-gray-500 mt-1">Manage All Services Ticket</p>
                </div>
            </div>



            <!-- TABLE & PAGINATION -->
            <section class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
                    <a href="#" data-modal-target="#addServicesTicketModal"
                        class="inline-flex items-center px-3 py-2 rounded-lg text-sm font-medium bg-indigo-600 text-white hover:bg-indigo-700 active:bg-indigo-800 active:scale-95 transition duration-150">
                        Add New</a>
                </div>

                <div class="overflow-x-auto">

                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-200 bg-gray-50">
                                <th class="px-3 py-2 text-left font-semibold text-gray-600">Action</th>
                                <th class="px-3 py-2 text-left font-semibold text-gray-600">Date Wo</th>
                                <th class="px-3 py-2 text-left font-semibold text-gray-600">Branch</th>
                                <th class="px-3 py-2 text-left font-semibold text-gray-600">No Wo Client</th>
                                <th class="px-3 py-2 text-left font-semibold text-gray-600">Type Wo</th>
                                <th class="px-3 py-2 text-left font-semibold text-gray-600">Client</th>
                                <th class="px-3 py-2 text-left font-semibold text-gray-600">Status</th>
                                <th class="px-3 py-2 text-left font-semibold text-gray-600">Teknisi</th>
                            </tr>
                        </thead>
                        <tbody id="services-ticket-data"></tbody>
                    </table>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-end gap-3 mt-4">
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

@section('modal')
    <div data-modal id="addServicesTicketModal"
        class="fixed inset-0 z-40 flex items-center justify-center px-4 py-6 bg-black bg-opacity-40 opacity-0 pointer-events-none transition-opacity duration-200">
        <div data-modal-panel
            class="bg-white max-w-3xl w-full rounded-2xl shadow-xl transform scale-95 transition-transform duration-200">
            <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
                <h3 class="text-base font-semibold text-gray-900">Add New Service Ticket</h3>
                <button data-modal-dismiss type="button" class="p-1.5 rounded-full hover:bg-gray-100 text-gray-500">
                    ✖
                </button>
            </div>
            <div class='px-5 py-4 space-y-3 text-sm'>


                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-800 mb-1" for="date-wo">
                            Date Wo
                        </label>
                        <input id="date-wo" type="date" required
                            class="block w-full rounded-xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-800 mb-1" for="branch">
                            Branch
                        </label>
                        <input id="branch" type="text" required
                            class="block w-full rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-800 mb-1" for="no-wo-client">
                            No Wo Client
                        </label>
                        <input id="no-wo-client" type="number" required
                            class="block w-full rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-800 mb-1" for="type-wo">
                            Type Wo
                        </label>
                        <input id="type-wo" type="text" required
                            class="block w-full rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-800 mb-1" for="client">
                            Client
                        </label>
                        <input id="client" type="text" required
                            class="block w-full rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-800 mb-1" for="teknisi">
                            Teknisi
                        </label>
                        <input id="teknisi" type="text" required
                            class="block w-full rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>

                </div>

                <div class="pt-3 mt-3 border-t border-gray-100 flex items-center justify-end space-x-2">
                    <button type="button" data-modal-dismiss id="close-add-modal"
                        class="px-3 py-2 rounded-lg text-sm font-medium border border-gray-300 text-gray-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="button" data-action="save"
                        class="px-4 py-2 rounded-lg text-sm font-medium bg-indigo-600 text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div data-modal id="editServicesTicketModal"
        class="fixed inset-0 z-40 flex items-center justify-center px-4 py-6 bg-black bg-opacity-40 opacity-0 pointer-events-none transition-opacity duration-200">
        <div data-modal-panel
            class="bg-white max-w-3xl w-full rounded-2xl shadow-xl transform scale-95 transition-transform duration-200">
            <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
                <h3 class="text-base font-semibold text-gray-900">Edit Service Ticket</h3>
                <button data-modal-dismiss type="button" class="p-1.5 rounded-full hover:bg-gray-100 text-gray-500">
                    ✖
                </button>
            </div>
            <div class='px-5 py-4 space-y-3 text-sm'>


                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-800 mb-1" for="edit-date-wo">
                            Date Wo
                        </label>
                        <input id="edit-date-wo" type="date" required
                            class="block w-full rounded-xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-800 mb-1" for="edit-branch">
                            Branch
                        </label>
                        <input id="edit-branch" type="text" required
                            class="block w-full rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-800 mb-1" for="edit-no-wo-client">
                            No Wo Client
                        </label>
                        <input id="edit-no-wo-client" type="number" required
                            class="block w-full rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-800 mb-1" for="edit-type-wo">
                            Type Wo
                        </label>
                        <input id="edit-type-wo" type="text" required
                            class="block w-full rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-800 mb-1" for="edit-client">
                            Client
                        </label>
                        <input id="edit-client" type="text" required
                            class="block w-full rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-800 mb-1" for="edit-teknisi">
                            Teknisi
                        </label>
                        <input id="edit-teknisi" type="text" required
                            class="block w-full rounded-xl border border-gray-200 bg-white px-3 py-2 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>

                </div>

                <div class="pt-3 mt-3 border-t border-gray-100 flex items-center justify-end space-x-2">
                    <button type="button" data-modal-dismiss id="close-edit-modal"
                        class="px-3 py-2 rounded-lg text-sm font-medium border border-gray-300 text-gray-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="button" data-action="update" data-id
                        class="px-4 py-2 rounded-lg text-sm font-medium bg-indigo-600 text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
