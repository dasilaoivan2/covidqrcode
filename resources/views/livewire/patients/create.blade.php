<x-jet-dialog-modal maxWidth="7xl">
    <x-slot name="title">
        Add Patient
    </x-slot>

    <x-slot name="content">
        <form>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-2 py-2 bg-gray-200 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="mb-4">
                            <label for="select_id" class="block text-gray-700 text-sm font-bold mb-2">*Category</label>
                            <select id="select_id" wire:model="category_id"
                                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Select...</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach

                            </select>
                            @error('category_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="select_id" class="block text-gray-700 text-sm font-bold mb-2">*ID Card</label>
                            <select id="select_id" wire:model="idcard_id"
                                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Select...</option>
                                @foreach($idcards as $idcard)
                                    <option value="{{$idcard->id}}">{{$idcard->name}}</option>
                                @endforeach

                            </select>
                            @error('idcard_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">*ID
                                No.</label>

                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Type Here..." wire:model="id_no">
                            @error('id_no') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Philhealth ID
                                No.</label>

                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Type Here..." wire:model="philhealth">
                            @error('philhealth') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">PWD ID
                                No.</label>

                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Type Here..." wire:model="pwd">
                            @error('pwd') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-2 px-3"></div>


            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-2 py-2 bg-gray-200 sm:p-6">
                    <div class="grid grid-cols-4 gap-6">
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">*FirstName</label>

                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Type Here..." wire:model="firstname">
                            @error('firstname') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">*MiddleName</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Type Here..." wire:model="middlename">
                            @error('middlename') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">*LastName</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Type Here..." wire:model="lastname">
                            @error('lastname') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">SuffixName
                                ex.(JR., SR., I, II, etc.)</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Type Here..." wire:model="suffixname">
                            @error('suffixname') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Contact
                                No.</label>

                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Type Here..." wire:model="contact_no">
                            @error('contact_no') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="select_id" class="block text-gray-700 text-sm font-bold mb-2">*Region</label>
                            <select id="select_id" wire:model="region_id"
                                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Select...</option>
                                @foreach($regions as $region)
                                    <option value="{{$region->id}}">{{$region->name}}</option>
                                @endforeach

                            </select>
                            @error('region_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="select_id" class="block text-gray-700 text-sm font-bold mb-2">*Province</label>
                            <select id="select_id" wire:model="province_id"
                                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Select...</option>
                                @foreach($provinces as $province)
                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                @endforeach

                            </select>
                            @error('province_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="select_id"
                                   class="block text-gray-700 text-sm font-bold mb-2">*Municipality</label>
                            <select id="select_id" wire:model="municipality_id"
                                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Select...</option>
                                @foreach($municipalities as $municipality)
                                    <option value="{{$municipality->id}}">{{$municipality->name}}</option>
                                @endforeach

                            </select>
                            @error('municipality_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="barangay_id"
                                   class="block text-gray-700 text-sm font-bold mb-2">*Barangay</label>
                            <select id="barangay_id" wire:model="barangay_id"
                                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Select...</option>
                                @foreach($barangays as $barangay)
                                    <option value="{{$barangay->id}}">{{$barangay->name}}</option>
                                @endforeach

                            </select>
                            @error('barangay_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="sex" class="block text-gray-700 text-sm font-bold mb-2">*Sex / Gender</label>
                            <select id="sex" wire:model="sex"
                                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Select...</option>

                                <option value="Male">Male</option>
                                <option value="Female">Female</option>


                            </select>
                            @error('sex') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Date
                                of Birth</label>
                            <input type="date"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Type Here..." wire:model="birthday">
                            @error('birthday') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">CONSENT</label>

                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Type Here..." wire:model="consent">
                            @error('consent') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Reason
                                for Refusal</label>
                            <textarea type="textarea"
                                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                      id="exampleFormControlInput1" placeholder="Type Here..."
                                      wire:model="reason">
                            @error('reason') <span class="text-red-500">{{ $message }}</span>@enderror
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-2 px-3"></div>

            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-2 py-2 bg-gray-200 sm:p-6">
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-6">

                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">1.
                                Age
                                more than
                                16 years old?</label>

                            <label class="block form-check-label">
                                <input type="radio" wire:model="more_sixteen"
                                       class="form-check-input" value="Yes"> Yes
                            </label>

                            <label class=" block form-check-label">
                                <input type="radio" wire:model="more_sixteen"
                                       class="form-check-input" value="No"> No
                            </label>

                            @error('more_sixteen') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">2.
                                Has no allergies to PEG or polysorbate?</label>

                            <label class="block form-check-label">
                                <input type="radio" wire:model="allergy_peg"
                                       class="form-check-input" value="Yes"> Yes
                            </label>

                            <label class=" block form-check-label">
                                <input type="radio" wire:model="allergy_peg"
                                       class="form-check-input" value="No"> No
                            </label>

                            @error('allergy_peg') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">3.
                                Has no severe allergic reaction after the 1st dose of the vaccine?</label>

                            <label class="block form-check-label">
                                <input type="radio" wire:model="allergy_react"
                                       class="form-check-input" value="Yes"> Yes
                            </label>

                            <label class=" block form-check-label">
                                <input type="radio" wire:model="allergy_react"
                                       class="form-check-input" value="No"> No
                            </label>

                            @error('allergy_react') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-2 gap-6">
                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">4.
                                Has no allergy to food, egg, medicines, and no asthma?</label>

                            <label class="block form-check-label">
                                <input type="radio" wire:model="allergy_food"
                                       class="form-check-input" value="Yes"> Yes
                            </label>

                            <label class=" block form-check-label">
                                <input type="radio" wire:model="allergy_food"
                                       class="form-check-input" value="No"> No
                            </label>

                            @error('allergy_food') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">*
                                If with allergy or asthma, will the vaccinator able to monitor the patient for 30
                                minutes?</label>

                            <label class="block form-check-label">
                                <input type="radio" wire:model="if_allergy_food"
                                       class="form-check-input" value="Yes"> Yes
                            </label>

                            <label class=" block form-check-label">
                                <input type="radio" wire:model="if_allergy_food"
                                       class="form-check-input" value="No"> No
                            </label>

                            @error('if_allergy_food') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-2 gap-6">
                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">5.
                                Has no history of bleeding disorders or currently taking anti-coagulants?</label>

                            <label class="block form-check-label">
                                <input type="radio" wire:model="history_bleeding"
                                       class="form-check-input" value="Yes"> Yes
                            </label>

                            <label class=" block form-check-label">
                                <input type="radio" wire:model="history_bleeding"
                                       class="form-check-input" value="No"> No
                            </label>

                            @error('history_bleeding') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">*
                                if with bleeding history, is a gauge 23 - 25 syringe available for injection?</label>

                            <label class="block form-check-label">
                                <input type="radio" wire:model="if_history_bleeding"
                                       class="form-check-input" value="Yes"> Yes
                            </label>

                            <label class=" block form-check-label">
                                <input type="radio" wire:model="if_history_bleeding"
                                       class="form-check-input" value="No"> No
                            </label>

                            @error('if_history_bleeding') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>


                    <div class="grid grid-cols-2 md:grid-cols-2 gap-6">
                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">6.
                                Does not manifest any of the following symptoms: Fever/chills, Headache, Cough, Colds,
                                Sore throat, Myalgia, Fatigue, Weakness, Loss of smell/taste, Diarrhea, Shortness of
                                breath/ difficulty in breathing</label>

                            <label class="block form-check-label">
                                <input type="radio" wire:model="manifest_symptoms"
                                       class="form-check-input" value="Yes"> Yes
                            </label>

                            <label class=" block form-check-label">
                                <input type="radio" wire:model="manifest_symptoms"
                                       class="form-check-input" value="No"> No
                            </label>

                            @error('manifest_symptoms') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">*
                                If manifesting any of the mentioned symptom/s, specify all that apply</label>

                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Type Here..." wire:model="if_manifest">
                            @error('if_manifest') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">7.
                                Has no history of exposure to a confirmed or suspected COVID-19 case in the past 2
                                weeks?</label>

                            <label class="block form-check-label">
                                <input type="radio" wire:model="history_exp_covid"
                                       class="form-check-input" value="Yes"> Yes
                            </label>

                            <label class=" block form-check-label">
                                <input type="radio" wire:model="history_exp_covid"
                                       class="form-check-input" value="No"> No
                            </label>

                            @error('history_exp_covid') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">8.
                                Has not been previously treated for COVID-19 in the past 90 days?
                            </label>
                            <label class="block form-check-label">
                                <input type="radio" wire:model="treated_covid"
                                       class="form-check-input" value="Yes"> Yes
                            </label>

                            <label class=" block form-check-label">
                                <input type="radio" wire:model="treated_covid"
                                       class="form-check-input" value="No"> No
                            </label>

                            @error('treated_covid') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">9.
                                Has not received any vaccine in the past 2 weeks?
                            </label>
                            <label class="block form-check-label">
                                <input type="radio" wire:model="received_vaccine"
                                       class="form-check-input" value="Yes"> Yes
                            </label>

                            <label class=" block form-check-label">
                                <input type="radio" wire:model="received_vaccine"
                                       class="form-check-input" value="No"> No
                            </label>

                            @error('received_vaccine') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">10.
                                Has not received convalescent plasma or monoclonal antibodies for COVID-19 in the past
                                90 days?
                            </label>
                            <label class="block form-check-label">
                                <input type="radio" wire:model="received_antibodies"
                                       class="form-check-input" value="Yes"> Yes
                            </label>

                            <label class=" block form-check-label">
                                <input type="radio" wire:model="received_antibodies"
                                       class="form-check-input" value="No"> No
                            </label>

                            @error('received_antibodies') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">11.
                                Not Pregnant?
                            </label>
                            <label class="block form-check-label">
                                <input type="radio" wire:model="pregnant"
                                       class="form-check-input" value="Yes"> Yes
                            </label>

                            <label class=" block form-check-label">
                                <input type="radio" wire:model="pregnant"
                                       class="form-check-input" value="No"> No
                            </label>

                            @error('pregnant') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">*
                                If pregnant, 2nd or 3rd Trimester?</label>

                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Type Here..." wire:model="if_pregnant">
                            @error('if_pregnant') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">12.
                                Does not have any of the following: HIV, Cancer/ Malignancy, Underwent Transplant, Under
                                Steroid Medication/ Treatment, Bed Ridden, terminal illness, less than 6 months
                                prognosis
                            </label>
                            <label class="block form-check-label">
                                <input type="radio" wire:model="terminal_illness"
                                       class="form-check-input" value="Yes"> Yes
                            </label>

                            <label class=" block form-check-label">
                                <input type="radio" wire:model="terminal_illness"
                                       class="form-check-input" value="No"> No
                            </label>

                            @error('terminal_illness') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">*
                                If with mentioned condition/s, specify.</label>

                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Type Here..."
                                   wire:model="if_terminal_illness">
                            @error('if_terminal_illness') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">*
                                If with mentioned condition, has presented medical clearance prior to vaccination
                                day?</label>

                            <label class="block form-check-label">
                                <input type="radio" wire:model="present_clearance"
                                       class="form-check-input" value="Yes"> Yes
                            </label>

                            <label class=" block form-check-label">
                                <input type="radio" wire:model="present_clearance"
                                       class="form-check-input" value="No"> No
                            </label>
                            @error('present_clearance') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-2 px-3"></div>

            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-2 py-2 bg-gray-200 sm:p-6">
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">DEFERRAL</label>

                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Type Here..." wire:model="deferral">
                            @error('deferral') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Vaccination
                                Date</label>
                            <input type="date"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Type Here..."
                                   wire:model="date_vaccinated">
                            @error('date_vaccinated') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Vaccination
                                Time</label>
                            <input type="time"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Type Here..."
                                   wire:model="time_vaccinated">
                            @error('time_vaccinated') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Vaccine
                                Manufacturer Name</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Type Here..."
                                   wire:model="vaccine_manufacturer">
                            @error('vaccine_manufacturer') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Batch
                                Number</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Type Here..." wire:model="batch_no">
                            @error('batch_no') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Lot
                                Number</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="exampleFormControlInput1" placeholder="Type Here..." wire:model="lot_no">
                            @error('lot_no') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="select_id" class="block text-gray-700 text-sm font-bold mb-2">*Vaccinator
                                Name</label>
                            <select id="select_id" wire:model="vaccinator_id"
                                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Select...</option>
                                @foreach($vaccinators as $vaccinator)
                                    <option value="{{$vaccinator->id}}">{{$vaccinator->fullname()}}</option>
                                @endforeach

                            </select>
                            @error('vaccinator_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">First
                                Dose
                            </label>
                            <label class="block form-check-label">
                                <input type="radio" wire:model="first_dose"
                                       class="form-check-input" value="Yes"> Yes
                            </label>

                            <label class=" block form-check-label">
                                <input type="radio" wire:model="first_dose"
                                       class="form-check-input" value="No"> No
                            </label>

                            @error('first_dose') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4 form-check">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Second
                                Dose
                            </label>
                            <label class="block form-check-label">
                                <input type="radio" wire:model="second_dose"
                                       class="form-check-input" value="Yes"> Yes
                            </label>

                            <label class=" block form-check-label">
                                <input type="radio" wire:model="second_dose"
                                       class="form-check-input" value="No"> No
                            </label>

                            @error('second_dose') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <div class="sm:flex sm:flex-row-reverse">
            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                <button wire:click.prevent="store()" type="button"
                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Save
                </button>
            </span>

            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                <button wire:click="closeCreate()" type="button"
                        class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Cancel
                </button>
            </span>
        </div>
    </x-slot>

</x-jet-dialog-modal>