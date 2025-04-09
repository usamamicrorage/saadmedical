
const showAlert = (icon, text, timer = 3000, position = 'top-end') => {
    Swal.fire({
        position: position,
        icon: icon,
        text: text,
        timer: timer,
    });
}


const addCustomer = (btn) => {
    document.querySelector('#custModalTitle').textContent = 'Add Contact';
    const action_btn = document.querySelector('#add_customer_btn')
    action_btn.textContent = 'Add Contact';
    action_btn.classList.remove('btn-warning');
    action_btn.classList.add('btn-primary');
    document.querySelector('#customer_form').setAttribute('action', btn.getAttribute('data-submit'));

    document.querySelectorAll('#customer_form input').forEach((input) => {
        input.value = '';
    })

    const modal = new bootstrap.Modal(document.getElementById('customerModal'));
    modal.show();

}


const fetchContact = (btn) => {
    const url = btn.getAttribute('data-url');
    axios.get(url).then((response) => {
        if (response?.data?.status == 'success') {
            const data = response?.data?.data;
            document.querySelector('#custModalTitle').textContent = 'Edit Contact';
            document.querySelector('#firstname').value = data.first_name;
            document.querySelector('#lastname').value = data.last_name;
            document.querySelector('#email').value = data.email;
            document.querySelector('#phone').value = data.phone;
            document.querySelector('#address').value = data.address;
            document.querySelector('#city').value = data.city;
            document.querySelector('#state').value = data.state;
            document.querySelector('#country').value = data.country;
            document.querySelector('#zip_code').value = data.zip_code;
            document.querySelector('#customer_id').value = data.id;

            const action_btn = document.querySelector('#add_customer_btn')
            action_btn.textContent = 'Update Contact';

            action_btn.classList.remove('btn-primary');
            action_btn.classList.add('btn-warning');

            document.querySelector('#customer_form').setAttribute('action', btn.getAttribute('data-submit'));

            const modal = new bootstrap.Modal(document.getElementById('customerModal'));
            modal.show();

        } else {
            showAlert('error', response?.data?.message, 3000, 'top-end');
        }
    }).catch((error) => {
        showAlert('error', 'Failed to fetch customer!', 3000, 'top-end');
        console.log(error);
    });
};



const deleteRow = (btn) => {
    Swal.fire({
        title: "Are you sure?",
        text: btn.getAttribute("data-message"),
        icon: "warning",
        showCancelButton: true,
        customClass: { confirmButton: "btn btn-primary me-2 mt-2", cancelButton: "btn btn-danger mt-2" },
        confirmButtonText: "Yes, delete it!",
        buttonsStyling: false,
        showCloseButton: true,
    }).then((result) => {
        if (result.isConfirmed) {
            let data = new FormData();
            data.append('id', btn.getAttribute('data-id'));

            axios.post(btn.getAttribute('data-url'), data)
                .then((response) => {
                    showAlert('success', 'Deleted Successfully!', 3000, 'top-end');

                    // Remove the row
                    const row = btn.closest("tr");
                    row.remove();

                    // Update row numbers
                    const rows = document.querySelectorAll("#warehouses_table tbody tr");
                    rows.forEach((row, index) => {
                        row.querySelector("td:first-child").textContent = index + 1;
                    });

                }).catch((error) => {
                    console.log(error);
                    if (error.response && error.response.status == 403) {
                        showAlert('error', error.response.data.message, 3000, 'top-end');
                    } else {
                        showAlert('error', 'Something went wrong!', 3000, 'top-end');
                    }
                });
        }
    });
};

const is_base = document.querySelector('#is_base');

is_base?.addEventListener('click', () => {
    if (is_base.checked) {
        document.querySelector('#master_div').style.display = 'none';
        document.querySelector('#master_unit').value = '';
        document.querySelector('#master_unit').classList.remove('required');
    } else {
        document.querySelector('#master_div').style.display = 'block';
        document.querySelector('#master_unit').classList.add('required');
    }

});


