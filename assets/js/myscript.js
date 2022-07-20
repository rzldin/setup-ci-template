const flashData = $(".flash-data").data("flashdata");
//console.log(flashData);

if (flashData) {
	Swal.fire("Konfirmasi", flashData, "success");
}

//berhasil login
const login = $(".berhasil-login").data("flashdata");
//console.log(flashData);

if (login) {
	Swal.fire({
		position: "center",
		icon: "success",
		title: "Selamat!",
		text: login,
		showConfirmButton: false,
		timer: 3000,
	});
}

//berhasil login
const gagaLogin = $(".gagal-login").data("flashdata");
//console.log(flashData);

if (gagaLogin) {
	Swal.fire({
		position: "center",
		icon: "error",
		title: "Maaf!",
		text: login,
		showConfirmButton: false,
		timer: 3000,
	});
}

//tombol hapus
$(".tombol-hapus").on("click", function (e) {
	e.preventDefault();
	const form = $(this).parents("form");
	Swal.fire({
		title: "Konfirmasi",
		text: "Ingin menghapus data ini?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Ya, Hapus",
		cancelButtonText: "Tidak",
	}).then((result) => {
		if (result.value) {
			form.submit();
			loadItem();
		}
	});
});

//tombol hapus
$(".hapus-link").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");
	Swal.fire({
		title: "Konfirmasi",
		text: "Ingin menghapus data ini?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Ya, Hapus",
		cancelButtonText: "Tidak",
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});

//Logout
$(".tombol-logout").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");

	Swal.fire({
		title: "Konfirmasi",
		text: "Anda ingin keluar?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Keluar",
		cancelButtonText: "Batal",
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});

//reset
$(".tombol-reset").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");

	Swal.fire({
		title: "Konfirmasi",
		text: "Anda ingin reset Pin?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Keluar",
		cancelButtonText: "Batal",
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});
