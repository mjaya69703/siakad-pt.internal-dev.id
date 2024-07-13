function logout(event) {
    event.preventDefault();

    Swal.fire({
        title: "Are you sure?",
        text: "You will be logged out!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, log out",
        cancelButtonText: "Cancel",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("logout-form").submit();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Cancelled", "Logout cancelled", "error");
        }
    });
}
function deleteData(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You are going to delete this item.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it",
        cancelButtonText: "Cancel",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("delete-form-" + id).submit();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Cancelled", "Deletion cancelled", "error");
        }
    });
}

function acceptData(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You want accept this data.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Accept it",
        cancelButtonText: "Cancel",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("accept-form-" + id).submit();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Cancelled", "Accept cancelled", "error");
        }
    });
}

function rejectData(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You want reject this data.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Reject it",
        cancelButtonText: "Cancel",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("reject-form-" + id).submit();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Cancelled", "Reject cancelled", "error");
        }
    });
}
$(document).ready(function () {
    $("#myTable").DataTable();
});
