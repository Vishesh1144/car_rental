// List of cities for each state in India
const stateCityMap = {
    Assam: ['Guwahati', 'Dibrugarh', 'Silchar', 'Jorhat', 'Tinsukia', 'Nagaon', 'Tezpur', 'Bongaigaon', 'Barpeta', 'Sivasagar'],
    Bihar: ['Patna', 'Gaya', 'Bhagalpur', 'Muzaffarpur', 'Darbhanga', 'Purnia', 'Arrah', 'Begusarai', 'Katihar', 'Munger'],
    Chhattisgarh: ['Raipur', 'Bhilai', 'Bilaspur', 'Korba', 'Durg', 'Rajnandgaon', 'Raigarh', 'Jagdalpur', 'Ambikapur'],
    Goa: ['Panaji', 'Margao', 'Vasco da Gama', 'Mapusa', 'Ponda', 'Bicholim', 'Curchorem', 'Valpoi'],
    Gujarat: ['Ahmedabad', 'Surat', 'Vadodara', 'Rajkot', 'Bhavnagar', 'Jamnagar', 'Junagadh', 'Gandhinagar', 'Nadiad', 'Morbi'],
    Haryana: ['Faridabad', 'Gurgaon', 'Panipat', 'Ambala', 'Yamunanagar', 'Rohtak', 'Hisar', 'Karnal', 'Sonipat', 'Panchkula'],
    HimachalPradesh: ['Shimla', 'Dharamshala', 'Solan', 'Mandi', 'Bilaspur', 'Chamba', 'Nahan', 'Hamirpur', 'Kullu'],
    Jharkhand: ['Ranchi', 'Jamshedpur', 'Dhanbad', 'Bokaro', 'Hazaribagh', 'Deoghar', 'Giridih', 'Phusro', 'Ramgarh'],
    Karnataka: ['Bangalore', 'Mysore', 'Hubli', 'Mangalore', 'Belgaum', 'Gulbarga', 'Davangere', 'Bellary', 'Bijapur'],
    Kerala: ['Thiruvananthapuram', 'Kochi', 'Kozhikode', 'Thrissur', 'Alappuzha', 'Palakkad', 'Kollam', 'Kannur', 'Kottayam'],
    MadhyaPradesh: ['Bhopal', 'Indore', 'Gwalior', 'Jabalpur', 'Ujjain', 'Sagar', 'Ratlam', 'Satna', 'Rewa'],
    Maharashtra: ['Mumbai', 'Pune', 'Nagpur', 'Thane', 'Nashik', 'Aurangabad', 'Solapur', 'Amravati', 'Kolhapur'],
    Manipur: ['Imphal', 'Churachandpur', 'Thoubal', 'Bishnupur', 'Ukhrul', 'Senapati', 'Kakching'],
    Meghalaya: ['Shillong', 'Tura', 'Nongpoh', 'Jowai', 'Nongstoin', 'Baghmara', 'Williamnagar', 'Cherrapunjee'],
    Mizoram: ['Aizawl', 'Lunglei', 'Champhai', 'Serchhip', 'Kolasib', 'Lawngtlai', 'Mamit', 'Saiha'],
    Nagaland: ['Kohima', 'Dimapur', 'Mokokchung', 'Tuensang', 'Mon', 'Wokha', 'Zunheboto', 'Phek', 'Kiphire'],
    Odisha: ['Bhubaneswar', 'Cuttack', 'Rourkela', 'Brahmapur', 'Sambalpur', 'Puri', 'Baleshwar', 'Baripada', 'Bhadrak'],
    Punjab: ['Ludhiana', 'Amritsar', 'Jalandhar', 'Patiala', 'Bathinda', 'Mohali', 'Hoshiarpur', 'Batala', 'Moga'],
    Rajasthan: ['Jaipur', 'Jodhpur', 'Udaipur', 'Kota', 'Bikaner', 'Ajmer', 'Bharatpur', 'Alwar', 'Pali'],
    Sikkim: ['Gangtok', 'Namchi', 'Gyalshing', 'Mangan'],
    TamilNadu: ['Chennai', 'Coimbatore', 'Madurai', 'Tiruchirappalli', 'Salem', 'Tirunelveli', 'Erode', 'Vellore'],
    Telangana: ['Hyderabad', 'Warangal', 'Nizamabad', 'Khammam', 'Karimnagar', 'Ramagundam', 'Mahbubnagar', 'Nalgonda'],
    Tripura: ['Agartala', 'Udaipur', 'Dharmanagar', 'Kailashahar', 'Belonia', 'Khowai', 'Amarpur'],
    UttarPradesh: ['Lucknow', 'Kanpur', 'Ghaziabad', 'Agra', 'Meerut', 'Varanasi', 'Allahabad', 'Bareilly', 'Aligarh'],
    Uttarakhand: ['Dehradun', 'Haridwar', 'Roorkee', 'Haldwani', 'Rudrapur', 'Kashipur', 'Rishikesh'],
    WestBengal: ['Kolkata', 'Howrah', 'Darjeeling', 'Siliguri', 'Durgapur', 'Asansol', 'Kharagpur', 'Haldia']
};

// Elements
const stateSelect = document.getElementById('state');
const citySelect = document.getElementById('city');

// Event Listener for State Selection
stateSelect.addEventListener('change', function() {
    const selectedState = this.value;
    
    // Clear the city dropdown
    citySelect.innerHTML = '<option value="" disabled selected>Select City</option>';

    if (stateCityMap[selectedState]) {
        // Populate city dropdown based on selected state
        stateCityMap[selectedState].forEach(city => {
            const option = document.createElement('option');
            option.value = city;
            option.textContent = city;
            citySelect.appendChild(option);
        });
    }
});
