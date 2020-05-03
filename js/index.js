function addItem() {

    let info = {
        'gender': '',
        'type': '',
        'name': '',
        'price': '',
        'contact': '',
        'photo': '',
        'description': ''
    };

    let gender = document.querySelector('#gender').value;

    let type = document.querySelector('#type').value;

    let name = document.querySelector('#name').value;

    let price = document.querySelector('#price').value;

    let contact = document.querySelector('#contact').value;

    let photo = document.querySelector('#photo').value;

    let description = document.querySelector('#description').value;

    if(gender == 'choose') {
        alert('Please Select the gender!');
        return;
    }

    if(type == 'type') {
        alert('Please Select the type!');
        return;
    }

    if(name == '') {
        alert('Please enter the item name!');
        return;
    }

    if(isNaN(price) || price == 0) {
        alert('Please enter a valid amout!');
        return;
    }

    if(isNaN(contact) || contact.length !== 10) {
        alert('Please enter a valid contact number!');
        return;
    }

    if(photo == '') {
        alert('Please insert a photo!');
        return;
    }

    if(description == '') {
        alert('Please enter a description!');
        return;
    }

    info.gender = gender,
    info.type = type,
    info.contact = contact
    info.price = price,
    info.photo = photo,
    info.description = description,
    
    localStorage.setItem("info", JSON.stringify(info));
    
    console.log(info);

    window.location.replace('./new1.html');


}
