                {{-- category --}}
                <div class="sm:col-span-3 flex flex-row gap-4">
                    <label for="category"
                        class="block text-sm font-medium leading-6 text-gray-900">{{ __('form.label.category') }}</label>
                    <div class="mt-2">
                        <select id="country" name="country" autocomplete="country-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option>Botanical</option>
                            <option>Food</option>
                            <option>Animals</option>
                        </select>
                    </div>
                    <div id="addCategoryBtn">click</div>
                </div>
