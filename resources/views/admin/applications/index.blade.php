@extends('admin.layout.app')

@section('pageTitle', 'Pre-Registrations')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">Pre-Registrations</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Submitted Pre-Registrations</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Pre-Registrations</h5>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <!-- Form for sorting and filtering -->
                            <form class="form form-horizontal" action="{{ route('applications.index') }}" method="get">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="lga-origin">LGA:</label>
                                            <select class="form-select mandatory" aria-label="Select Local Government Area"
                                                id="lga-origin" name="lga-origin" placeholder="Choose your LGA">
                                                <option value=""></option>
                                                <option value="Auyo" @if ($selectedLga == 'Auyo') selected @endif>Auyo</option>
                                                <option value="Babura" @if ($selectedLga == 'Babura') selected @endif>Babura</option>
                                                <option value="Biriniwa" @if ($selectedLga == 'Biriniwa') selected @endif>Biriniwa</option>
                                                <option value="BirninKudu" @if ($selectedLga == 'Birnin Kudu') selected @endif>Birnin Kudu</option>
                                                <option value="Buji" @if ($selectedLga == 'Buji') selected @endif>Buji</option>
                                                <option value="Dutse" @if ($selectedLga == 'Dutse') selected @endif>Dutse</option>
                                                <option value="Gagarawa" @if ($selectedLga == 'Gagarawa') selected @endif>Gagarawa</option>
                                                <option value="Garki" @if ($selectedLga == 'Garki') selected @endif>Garki</option>
                                                <option value="Gumel" @if ($selectedLga == 'Gumel') selected @endif>Gumel</option>
                                                <option value="Guri" @if ($selectedLga == 'Guri') selected @endif>Guri</option>
                                                <option value="Gwaram" @if ($selectedLga == 'Gwaram') selected @endif>Gwaram</option>
                                                <option value="Gwiwa" @if ($selectedLga == 'Gwiwa') selected @endif>Gwiwa</option>
                                                <option value="Hadejia" @if ($selectedLga == 'Hadejia') selected @endif>Hadejia</option>
                                                <option value="Jahun" @if ($selectedLga == 'Jahun') selected @endif>Jahun</option>
                                                <option value="KafinHausa" @if ($selectedLga == 'KafinHausa') selected @endif>Kafin Hausa</option>
                                                <option value="Kaugama" @if ($selectedLga == 'Kaugama') selected @endif>Kaugama</option>
                                                <option value="Kazaure" @if ($selectedLga == 'Kazaure') selected @endif>Kazaure</option>
                                                <option value="Kirikasamma" @if ($selectedLga == 'Kirikasamma') selected @endif>Kirikasamma</option>
                                                <option value="Kiyawa" @if ($selectedLga == 'Kiyawa') selected @endif>Kiyawa</option>
                                                <option value="Maigatari" @if ($selectedLga == 'Maigatari') selected @endif>Maigatari</option>
                                                <option value="MalamMadori" @if ($selectedLga == 'MalamMadori') selected @endif>Malam Madori</option>
                                                <option value="Miga" @if ($selectedLga == 'Miga') selected @endif>Miga</option>
                                                <option value="Ringim" @if ($selectedLga == 'Ringim') selected @endif>Ringim</option>
                                                <option value="Roni" @if ($selectedLga == 'Roni') selected @endif>Roni</option>
                                                <option value="SuleTankarkar" @if ($selectedLga == 'SuleTankarkar') selected @endif>Sule Tankarkar</option>
                                                <option value="Taura" @if ($selectedLga == 'Taura') selected @endif>Taura</option>
                                                <option value="Yankwashi" @if ($selectedLga == 'Yankwashi') selected @endif>Yankwashi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="ward">Ward:</label>
                                            <select class="form-select mandatory" id="ward" name="ward">
                                                <option value=""></option>
                                                @if ($selectedLga && isset($lgaWards[$selectedLga]))
                                                    @foreach ($lgaWards[$selectedLga] as $ward)
                                                        <option value="{{ $ward }}"
                                                            @if ($selectedWard == $ward) selected @endif>
                                                            {{ $ward }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="highest-education">Qualification:</label>
                                            <select id="highest-education" name="highest_education"
                                                class="form-select mandatory">
                                                <option value=""></option>
                                                <option value="none" @if ($selectedHighestEducation == 'none') selected @endif>None</option>
                                                <option value="primary-school" @if ($selectedHighestEducation == 'primary-school') selected @endif>Primary School</option>
                                                <option value="secondary-school" @if ($selectedHighestEducation == 'secondary-school') selected @endif>Secondary School</option>
                                                <option value="vocational-training" @if ($selectedHighestEducation == 'vocational-training') selected @endif>Vocational Training</option>
                                                <option value="diploma" @if ($selectedHighestEducation == 'diploma') selected @endif>Diploma</option>
                                                <option value="bachelors-degree" @if ($selectedHighestEducation == 'bachelors-degree') selected @endif>Bachelor's Degree</option>
                                                <option value="masters-degree" @if ($selectedHighestEducation == 'masters-degree') selected @endif>Master's Degree</option>
                                                <option value="doctorate" @if ($selectedHighestEducation == 'doctorate') selected @endif>Doctorate</option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="max-age">Area of Study:</label>
                                            <input type="text" class="form-control" name="area_of_study" id="area_of_study" placeholder="" @if ($area_of_study != null) value="{{ $area_of_study }}" @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="gender">Gender:</label>
                                            <select class="form-select" name="gender" id="gender">
                                                <option value=""></option>
                                                <option value="male" @if ($selectedGender == 'male') selected @endif>
                                                    Male</option>
                                                <option value="female" @if ($selectedGender == 'female') selected @endif>
                                                    Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="program">Program:</label>
                                            <select class="form-select" id="program" name="program">
                                                <option value=""></option>
                                                @foreach ($programs as $program)
                                                    <option value="{{ $program->id }}"
                                                        @if ($selectedProgram == $program->id) selected @endif>
                                                        {{ $program->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="max-age">Maximum Age:</label>
                                            <input type="number" class="form-control" name="max-age" id="max-age" placeholder="" @if ($max_age != null) value="{{ $max_age }}" @endif>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">Apply Filters</button>
                                    </div>
                                </div>
                              
                            </form>
                    

                            <!-- Table to display data -->
                            <form action="{{ route('applications.bulkAction') }}" method="post">
                                @csrf
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="bulk-action">Bulk Action:</label>
                                            <select class="form-select" name="bulk-action" id="bulk-action">
                                                <option value=""></option>
                                                @foreach ($collections as $collection)
                                                    <option value="add_to_collection_{{ $collection->id }}">
                                                        Add to Collection: {{ $collection->title }}
                                                    </option>
                                                @endforeach
                                                <option value="reject">Reject Applications</option>
                                                <option value="delete">Delete Applications</option>
                                            </select>                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center">
                                        <button type="submit" class="btn btn-primary">Apply Bulk Action</button>
                                    </div>
                                </div>
                         
                            
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>
                                                <input type="checkbox" id="selectAll" onclick="selectAllRows()">
                                            </th>
                                            <th>Application Number</th>
                                            <th>Full Name</th>
                                            <th>Date of Birth</th>
                                            <th>Gender</th>
                                            <th>Marital Status</th>
                                            <th>Highest Education</th>
                                            <th>Action</th>
                                            <!-- Add more table headings for other fields -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($applications as $key => $application)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>
                                                    <input type="checkbox" name="selectedApplications[]" value="{{ $application->user_id }}">
                                                </td>
                                                <td>{{ $application->yeea_number }}</td>
                                                <td>{{ $application->full_name }}</td>
                                                <td>{{ $application->date_of_birth }}</td>
                                                <td>{{ $application->gender }}</td>
                                                <td>{{ $application->marital_status }}</td>
                                                <td>{{ $application->highest_education }}</td>
                                                <td>
                                                    <a href="{{ route('applications.show', $application->id) }}" target="_blank" class="btn btn-primary">Details</a>
                                                </td>
                                                <!-- Add more table data cells for other fields -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endsection
        @section('js')
        <script>
            // Function to handle checking/unchecking all checkboxes
            function selectAllRows() {
                var selectAll = document.getElementById('selectAll');
                var checkboxes = document.getElementsByName('selectedApplications[]');
        
                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = selectAll.checked;
                }
            }
        </script>
        
        
        <script>
            // JavaScript to populate wards based on selected LGA

            const lgaWards = {
                Auyo: ["", "Auyo Ward", "Ayan Ward", "Auyaki Ward", "Ayama Ward", "Gatafa Ward",
                    "Gamafoi Ward", "Gamsarka Ward", "Kafur Ward", "Tsidir Ward", "Unik Ward"
                ],
                Babura: ["", "Kuzunzumi Ward", "Batali Ward", "Jigawa Ward", "Babura Ward", "Garu Ward",
                    "Insharuwa Ward", "Kanya Ward", "Kyambo Ward", "Dorawa Ward", "Gasakoli Ward",
                    "Takwasawa Ward"
                ],
                Biriniwa: ["", "Kachallare Ward", "Machinamari  Ward", "Kazura Ward", "Diginsa Ward",
                    "Nguwa Ward", "Fagi Ward", "Batu Ward", "Birniwa Ward", "Dangwaleri Ward",
                    "Karanka Ward", "Matamu Ward"
                ],
                BirninKudu: ["", "Birnin Kudu Ward ", "Kiyako Ward", "Wurno ward",
                    "Kangire ward", "Yalwan Damai ward", "Unguwar Ya Ward", "Lafia Ward",
                    "Kwangwara ward", "Sundumina Ward", "Kantoga Ward", "Surko Ward"
                ],
                Buji: ["", "Gantsa ward", "Kukuma Ward", "Yayari Ward", "Ahoto Ward", "Kayawa Ward",
                    "Lelen Kudu Ward", "Falageri Ward", "Madabe Ward", "Chirbin Ward", "Buji Ward"
                ],
                Dutse: ["", "Ayan Ward", "Chamo Ward", "Duru Ward", "Dundubus Ward", "Limawa Ward", "Kachi Ward",
                    "J/Tsada Ward", "Sakwaya Ward", "Kudai Ward", "Madobi Ward", "Karnaya Ward"
                ],
                Gagarawa: ["", "Madaka Ward", "Maikilili Ward", "Zarada Ward", "Yalawa Ward", "Tasha Ward",
                    "Medu Ward", "Gari Ward", "Garin Chiroma Ward", "Maiaduwa Ward",
                    "Korebalatu Ward"
                ],
                Garki: ["", "Gwarzo Ward", "Doko Ward", "Sayori Ward", "Buduru Ward", "Kargo Ward", "Jirima Ward",
                    "Rafin Marke Ward", "Kanya Ward", "Kore Ward", "Muku Ward", "Garki Ward"
                ],
                Gumel: ["", "Dantanoma Ward", "Gusau Ward", "Dan Ama Ward", "Garin Gambo Ward", "Hammado Ward",
                    "Galagamma Ward", "Kofar Arewa Ward", "Kofar Yamma Ward", "Garin Barka Ward",
                    "Zango Ward", "Baikarya Ward"
                ],
                Guri: ["", "Garbagal Ward", "Adiyani Ward", "Lafiya Ward", "Guri Ward", "Margadu Ward",
                    "Matara Babba Ward", "Dawa Ward", "Abunabo Ward", "Musari Ward", "Kadira Ward"
                ],
                Gwaram: ["", "Gwaram Ward", "Zandam Nagogo Ward", "Sara Ward", "Maruta Ward", "Tsangarwa Ward",
                    "Fagam Ward", "Basirka Ward", "Farin Dutse Ward", "Dingaya Ward", "Kwandiko Ward",
                    "Kila Ward"
                ],
                Gwiwa: ["", "Dabi Ward", "Rurau Ward", "Yola Ward", "Firjin Yamma Ward", "Buntusu Ward",
                    "Darina Ward", "Korayal Ward", "Shafi Ward", "Zauma Ward", "Guntai Ward"
                ],
                Hadejia: ["", "Atafi Ward", "Dubantu Ward", "Gagulmari Ward", "Kasuwar Kuda Ward",
                    "Majema Ward", "Matsaro Ward", "Rumfa Ward", "Sabon Garu Ward", "Yankoli Ward",
                    "Yayari Ward", "Kasuwar Kofa Ward"
                ],
                Jahun: ["", "Jahun Ward", "Aujara Ward", "Gauza Tazara Ward", "Kali Ward", "Kanwa Ward",
                    "Gunka Ward", "Gangawa Ward", "Jabarna Ward", "Indaduna Ward", "Harbo Sabuwa Ward",
                    "Harbo Tsohuwa Ward"
                ],
                KafinHausa: ["", "Kafin Hausa Ward", "Kwazalewa Ward", "Dumadumin Toka Ward", "Sarawa Ward",
                    "Gafaya Ward", "Jabo Ward", "Zago Ward", "Majawa Ward", "Mezan Ward",
                    "Bulangu Ward", "Ruba Ward"
                ],
                Kaugama: ["", "Kaugama Ward", "Dakayyaawa Ward", "Askandu Ward", "Marke Ward", "Ja‘E Ward",
                    "Unguwar Jibrin Ward", "Dabuwaran Ward", "Arbus Ward", "Hadin Ward", "Yalo Ward",
                    "Jarkasa Ward"
                ],
                Kazaure: ["", "Gabas Ward", "Mardawa Ward", "Sabaru Ward", "Arewa Ward",
                    "Baauzune Ward", "Yamma Ward", "Kanti Ward", "Gada Ward", "Dandi Ward",
                    "Dabaza Ward", "Daba Ward"
                ],
                Kirikasamma: ["", "Madaci Ward", "Doleri Ward", "Fandum Ward", "Kirikasamma Ward",
                    "Turabu Ward", "Marma Ward", "Gayin Ward", "Tasheguwa Ward", "Bulunchai Ward",
                    "Baturiya Ward"
                ],
                Kiyawa: ["", "Balago Ward", "Katuka Ward", "Kwanda Ward", "Kiyawa Ward", "Fake Ward",
                    "Katanga Ward", "Andaza Ward", "Gurduba Ward", "Maje Ward", "Garko Ward", "Tsirma Ward"
                ],
                Maigatari: ["", "Maigatari Arewa Ward", "Maigatari Kudu Ward", "Matoya Ward", "Fulata Ward",
                    "Madana Ward", "Turbus Ward", "Dan kumbo Ward", "Jajire Ward", "Kukayisku Ward",
                    "Galadi Ward", "Balarabe Ward"
                ],
                MalamMadori: ["", "Dunari Ward", "Arki Ward", "G/Gabas Ward", "Takwaro Ward",
                    "Tonikutari Ward", "Futuka Ward", "Mairakumi Ward", "Mukaddari Ward",
                    "Malam Madori Ward", "Tashena Ward", "Shayya Ward"
                ],
                Miga: ["", "Hantsu Ward", "Tsakuwawa Ward", "S/Takanebu Ward", "Garba Ward", "Zareku Ward",
                    "Miga Ward", "Dangyatin Ward", "Sansani Ward", "Koya Ward", "Yanduna Ward"
                ],
                Ringim: ["", "Chai-Chai Ward", "Yandutse Ward", "Karshi Ward", "Tofa Ward", "Dabi Ward",
                    "Saltimawa Ward", "Sankara Ward", "Ringim Ward", "Kyarama Ward",
                    "Kafin Babushi Ward"
                ],
                Roni: ["", "Amaryawa Ward", "Baragumi Ward", "Dansure Ward", "Fara Ward", "Gora Ward",
                    "Kwaita Ward", "Sankau Ward", "Tunas Ward", "Yanzaki Ward",
                    "Zugai Ward", "Roni Ward"
                ],
                SuleTankarkar: ["", "Albasu Ward", "Danzomo Ward", "Takatsaba Ward", "Shabaru Ward",
                    "Amanga Ward", "Jeke Ward", "Yandamo Ward", "Dangwanki Ward",
                    "Suletankarkar Ward", "Danladi Ward"
                ],
                Taura: ["", "Majia Ward", "Cukuta Ward", "Kwalam Ward", "Gujungu Ward", "Cakwaikwaiwa Ward",
                    "Sabongari Yaya Ward", "Maje Ward", "Kirikasamma Ward", "Aujara Ward", "Taura Ward"
                ],
                Yankwashi: ["", "Yankwashi Ward", "Acilafiya Ward", "Belas Ward", "Dawangayo Ward", "Gurjiya Ward",
                    "Gwarta Ward", "Karkarna Ward", "Kuda Ward", "Ringim Ward", "Zungumba Ward"
                ],
            };

            // Function to populate the wards select field based on the selected LGA
            function populateWards() {
                const selectedLGA = document.getElementById('lga-origin').value;
                const wardsSelect = document.getElementById('ward');

                // Clear the previous options
                wardsSelect.innerHTML = '';

                // Populate the wards based on the selected LGA
                if (selectedLGA && lgaWards[selectedLGA]) {
                    lgaWards[selectedLGA].forEach((ward) => {
                        const option = document.createElement('option');
                        option.value = ward;
                        option.textContent = ward;
                        wardsSelect.appendChild(option);
                    });
                }
            }

            // Add an event listener to the LGA select field
            const lgaSelect = document.getElementById('lga-origin');
            lgaSelect.addEventListener('change', populateWards);

            // Initially populate wards based on the default selected LGA
            populateWards();
        </script>
    @endsection
