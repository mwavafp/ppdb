<x-layoute>
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Flash Messages -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded shadow-md mb-6 flex items-center" role="alert">
                <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- General Contact Settings -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8 border border-gray-200">
            <div class="p-8">
                <h3 class="text-xl font-medium text-gray-900 mb-6 border-b pb-2">General Contact Information</h3>

                <form method="POST" action="{{ route('contact-update-general') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <input 
                                id="email" 
                                name="email" 
                                type="email" 
                                value="{{ old('email', $settings->email ?? '') }}"  
                                placeholder="you@example.com"
                                class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                            />
                            @error('email') 
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Physical Address</label>
                            <textarea 
                                id="address" 
                                name="address" 
                                rows="3" 
                                required
                                class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                            >{{ old('address', $settings->address ?? '') }}</textarea>
                            @error('address') 
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                            @enderror
                        </div>
                    </div>

                    <h3 class="text-xl font-medium text-gray-900 mt-8 mb-6 border-b pb-2">Social Media Links</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="mb-4">
                            <label for="facebook_url" class="block text-sm font-medium text-gray-700 mb-2">Facebook URL</label>
                            <input 
                                id="facebook_url" 
                                name="facebook_url" 
                                type="url" 
                                value="{{ old('facebook_url', $settings->facebook_url ?? '') }}" 
                                class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                            />
                            @error('facebook_url') 
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="instagram_url" class="block text-sm font-medium text-gray-700 mb-2">Instagram URL</label>
                            <input 
                                id="instagram_url" 
                                name="instagram_url" 
                                type="url" 
                                value="{{ old('instagram_url', $settings->instagram_url ?? '') }}" 
                                class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                            />
                            @error('instagram_url') 
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="whatsapp_url" class="block text-sm font-medium text-gray-700 mb-2">WhatsApp URL</label>
                            <input 
                                id="whatsapp_url" 
                                name="whatsapp_url" 
                                type="url" 
                                value="{{ old('whatsapp_url', $settings->whatsapp_url ?? '') }}" 
                                class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                            />
                            @error('whatsapp_url') 
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="youtube_url" class="block text-sm font-medium text-gray-700 mb-2">YouTube URL</label>
                            <input 
                                id="youtube_url" 
                                name="youtube_url" 
                                type="url" 
                                value="{{ old('youtube_url', $settings->youtube_url ?? '') }}" 
                                class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                            />
                            @error('youtube_url') 
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                            @enderror
                        </div>
                    </div>
                    <div class="mt-8">
                        <label for="building_image" class="block text-sm font-medium text-gray-700 mb-1">Building Image</label>
                        @if(isset($settings) && $settings->building_image)
                            <div class="mb-2">
                                <p class="mb-2 text-sm text-gray-600">Current image:</p>
                                <div class="border border-gray-200 rounded-lg p-2 inline-block">
                                    <img src="{{ $settings->building_image_base64 }}" alt="Building Image" class="max-w-md h-auto rounded-lg">
                                </div>
                            </div>
                        @endif
                    <div class="mb-1">
                        <label for="building_image" class="block text-sm font-medium text-gray-700 mb-2">Building Image</label>
                        <div class="flex items-center space-x-2">
                            <!-- Placeholder gambar -->
                            <div class="h-16 w-16 flex items-center justify-center rounded-lg border border-dashed border-gray-300 bg-gray-50">
                                <svg class="h-8 w-8 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M3 16l4.586-4.586a2 2 0 012.828 0L16 16m0 0l1.586-1.586a2 2 0 012.828 0L21 16M13 7h.01M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <!-- Input file -->
                            <input 
                                id="building_image" 
                                type="file" 
                                name="building_image" 
                                class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                                    file:rounded-lg file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-indigo-50 file:text-indigo-700
                                    hover:file:bg-indigo-100
                                    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                            />
                        </div>
                        @error('building_image') 
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                        @enderror
                    </div>

                    <div class="flex items-center justify-end mt-8">
                        <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md shadow-sm flex items-center">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            {{ __('Save Changes') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Contact Persons -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 border border-gray-200">
            <div class="p-8">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-medium text-gray-900 border-b pb-2">Contact Persons</h3>
                    <button id="showAddContactPersonForm" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md shadow-sm flex items-center">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add New Contact
                    </button>
                </div>

                <!-- Add Contact Person Form (Hidden by default) -->
                <div id="addContactPersonForm" class="hidden mb-8 p-6 border border-dashed border-gray-300 rounded-lg bg-gray-50">
                    <h4 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                        <svg class="h-5 w-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        Add New Contact Person
                    </h4>
                    
                    <form method="POST" action="{{ route('contact-store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                <input id="name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" type="text" name="name" value="{{ old('name') }}" required />
                                @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Role/Position</label>
                                <input id="description" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" type="text" name="description" value="{{ old('description') }}" required />
                                @error('description') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number (with country code)</label>
                                <input id="phone" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" type="text" name="phone" value="{{ old('phone') }}" placeholder="e.g. 6289656488667" required />
                                @error('phone') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="whatsapp_message" class="block text-sm font-medium text-gray-700 mb-1">Default WhatsApp Message</label>
                                <textarea id="whatsapp_message" name="whatsapp_message" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" rows="2">{{ old('whatsapp_message', 'Assalamualaikum') }}</textarea>
                                @error('whatsapp_message') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>

                        <div class="md:col-span-2">
                            <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Profile Photo</label>
                            <div class="flex items-center space-x-2">
                                <!-- Placeholder bulat -->
                                <div class="h-16 w-16 flex items-center justify-center rounded-full border border-dashed border-gray-300 bg-gray-50">
                                    <svg class="h-8 w-8 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                            d="M5.121 17.804A9 9 0 1118.88 6.196 9 9 0 015.12 17.804zM15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <!-- Input file -->
                                <input 
                                    id="photo" 
                                    type="file" 
                                    name="photo" 
                                    class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                                        file:rounded-lg file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-indigo-50 file:text-indigo-700
                                        hover:file:bg-indigo-100
                                        focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                                />
                            </div>
                            @error('photo') 
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                            @enderror
                        </div>
                        </div>
                        <div class="flex items-center justify-end mt-6">
                            <button type="button" id="cancelAddContactPerson" class="bg-white hover:bg-gray-100 text-gray-700 font-medium py-2 px-4 border border-gray-300 rounded-md shadow-sm mr-3">
                                Cancel
                            </button>
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md shadow-sm flex items-center">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                {{ __('Add Contact Person') }}
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Contact Persons List -->
                <div class="mt-6">
                    @if($contactPersons->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($contactPersons as $person)
                                <div class="border rounded-lg overflow-hidden shadow-sm transition-all duration-300 hover:shadow-md bg-white" id="contact-person-{{ $person->id }}">
                                    <div class="border-b bg-gray-50 p-4">
                                        <div class="flex items-center">
                                            @if($person->photo)
                                                <img src="{{ $person->photo_base64 }}" alt="{{ $person->name }}" class="w-16 h-16 rounded-full object-cover border-2 border-white shadow-sm mr-4">
                                            @else
                                                <div class="w-16 h-16 rounded-full bg-indigo-100 text-indigo-500 flex items-center justify-center mr-4 shadow-sm border-2 border-white">
                                                    <span class="text-xl font-bold">{{ substr($person->name, 0, 1) }}</span>
                                                </div>
                                            @endif
                                            <div>
                                                <h4 class="font-bold text-gray-900">{{ $person->name }}</h4>
                                                <p class="text-gray-600 text-sm">{{ $person->description }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-4">
                                        <div class="mb-3">
                                            <p class="flex items-center text-sm">
                                                <svg class="h-4 w-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                                </svg>
                                                <span class="font-medium text-gray-700 mr-1">Phone:</span>
                                                <span>{{ $person->phone }}</span>
                                            </p>
                                            <p class="flex items-center text-sm mt-2">
                                                <svg class="h-4 w-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                                </svg>
                                                <span class="font-medium text-gray-700 mr-1">WhatsApp:</span>
                                                <a href="{{ $person->whatsapp_url }}" target="_blank" class="text-indigo-600 hover:text-indigo-800">Open chat</a>
                                            </p>
                                            <p class="flex items-start text-sm mt-2">
                                                <svg class="h-4 w-4 mr-2 text-gray-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-4l-4 4z"></path>
                                                </svg>
                                                <span class="font-medium text-gray-700 mr-1">Message:</span>
                                                <span class="text-gray-600">{{ Str::limit($person->whatsapp_message, 30) }}</span>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="px-4 py-3 bg-gray-50 border-t flex justify-end space-x-2">
                                        <button onclick="showEditForm({{ $person->id }})" class="bg-amber-500 hover:bg-amber-600 text-white font-medium py-1.5 px-3 rounded text-xs flex items-center">
                                            <svg class="h-3.5 w-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            Edit
                                        </button>
                                        <form method="POST" action="{{ route('contact-delete', $person->id) }}" onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-medium py-1.5 px-3 rounded text-xs flex items-center">
                                                <svg class="h-3.5 w-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Edit Form (Hidden by default) -->
                                    <div id="edit-form-{{ $person->id }}" class="hidden border-t border-gray-200 p-4 bg-gray-50">
                                        <h5 class="font-bold text-gray-800 mb-4 flex items-center">
                                            <svg class="h-4 w-4 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            Edit Contact Person
                                        </h5>
                                        
                                        <form method="POST" action="{{ route('contact-update', $person->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="grid grid-cols-1 gap-4">
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                                                    <input type="text" name="name" value="{{ $person->name }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                                    <input type="text" name="description" value="{{ $person->description }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                                                    <input type="text" name="phone" value="{{ $person->phone }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">WhatsApp Message</label>
                                                    <textarea name="whatsapp_message" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" rows="2">{{ $person->whatsapp_message }}</textarea>
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Profile Photo</label>
                                                    @if($person->photo)
                                                        <div class="mb-2">
                                                            <img src="{{ $person->photo_base64 }}" alt="Current photo" class="h-16 w-16 object-cover rounded-full border shadow-sm">
                                                        </div>
                                                    @endif
                                                    <input type="file" name="photo" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
                                                </div>
                                            </div>

                                            <div class="flex justify-end mt-4">
                                                <button type="button" onclick="hideEditForm({{ $person->id }})" class="bg-white hover:bg-gray-100 text-gray-700 font-medium py-1.5 px-3 border border-gray-300 rounded shadow-sm mr-2 text-sm">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-1.5 px-3 rounded shadow-sm text-sm flex items-center">
                                                    <svg class="h-3.5 w-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                    Save Changes
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8 bg-gray-50 rounded-lg border border-dashed border-gray-300">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No contact persons</h3>
                            <p class="mt-1 text-sm text-gray-500">No contact persons added yet.</p>
                            <div class="mt-4">
                                <button id="showAddContactPersonMobile" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Add Contact Person
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Show/Hide Add Contact Person Form
    document.getElementById('showAddContactPersonForm').addEventListener('click', function() {
        document.getElementById('addContactPersonForm').classList.remove('hidden');
    });

    // Mobile version button (only shows when no contacts exist)
    const mobileButton = document.getElementById('showAddContactPersonMobile');
    if (mobileButton) {
        mobileButton.addEventListener('click', function() {
            document.getElementById('addContactPersonForm').classList.remove('hidden');
        });
    }

    document.getElementById('cancelAddContactPerson').addEventListener('click', function() {
        document.getElementById('addContactPersonForm').classList.add('hidden');
    });

    // Show/Hide Edit Forms
    function showEditForm(id) {
        document.getElementById('edit-form-' + id).classList.remove('hidden');
    }

    function hideEditForm(id) {
        document.getElementById('edit-form-' + id).classList.add('hidden');
    }
</script>

</x-layoute>