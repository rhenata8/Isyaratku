@extends('layouts.admin')

@section('content')


<h2 class="text-xl font-bold mb-4 capitalize">Kuis Level {{ $level }}</h2>

{{-- Form Tambah --}}
<form id="add-question-form" method="POST" class="bg-white p-4 rounded shadow mb-4">
    @csrf
    <input type="hidden" name="level" value="{{ $level }}">
    <input type="text" name="pertanyaan" placeholder="Pertanyaan" class="w-full mb-2 p-2 border" required>
    <input type="text" name="opsi_a" placeholder="Opsi A" class="w-full mb-2 p-2 border" required>
    <input type="text" name="opsi_b" placeholder="Opsi B" class="w-full mb-2 p-2 border" required>
    <input type="text" name="opsi_c" placeholder="Opsi C" class="w-full mb-2 p-2 border" required>
    <input type="text" name="opsi_d" placeholder="Opsi D" class="w-full mb-2 p-2 border" required>
    <select name="jawaban" class="w-full mb-2 p-2 border">
        <option value="a">A</option>
        <option value="b">B</option>
        <option value="c">C</option>
        <option value="d">D</option>
    </select>
    <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded">Tambah Soal</button>
</form>

{{-- Pesan Sukses/Error AJAX --}}
<div id="ajax-message" class="hidden mb-4 p-3 rounded" role="alert"></div>

{{-- List Soal --}}
<div class="bg-white shadow rounded p-4">
    <h3 class="font-semibold mb-2">Daftar Soal</h3>
    <table class="w-full text-left">
        <thead>
            <tr>
                <th>Pertanyaan</th>
                <th>Jawaban</th>

            </tr>
        </thead>
        <tbody id="questions-table-body">
            @foreach ($data as $soal)
                <tr class="border-t" id="question-{{ $soal->id }}">
                    <td>{{ $soal->pertanyaan }}</td>
                    <td>{{ strtoupper($soal->jawaban) }}</td>
                    <td class="space-x-2">

                        <button type="button" data-id="{{ $soal->id }}" class="delete-btn text-red-600">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const addQuestionForm = document.getElementById('add-question-form');
    const questionsTableBody = document.getElementById('questions-table-body');
    const ajaxMessage = document.getElementById('ajax-message');

    addQuestionForm.addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        const formData = new FormData(this);

        // Clear previous messages
        ajaxMessage.classList.add('hidden');
        ajaxMessage.textContent = '';
        ajaxMessage.classList.remove('bg-green-100', 'text-green-700', 'bg-red-100', 'text-red-700');

        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {

                ajaxMessage.classList.remove('hidden');
                ajaxMessage.classList.add('bg-green-100', 'text-green-700');
                ajaxMessage.textContent = data.message;


                const newRow = `
                    <tr class="border-t" id="question-${data.question.id}">
                        <td>${data.question.pertanyaan}</td>
                        <td>${data.question.jawaban.toUpperCase()}</td>
                        <td class="space-x-2">

                            <button type="button" data-id="${data.question.id}" class="delete-btn text-red-600">Hapus</button>
                        </td>
                    </tr>
                `;
                questionsTableBody.insertAdjacentHTML('beforeend', newRow);


                addQuestionForm.reset();

            } else {

                ajaxMessage.classList.remove('hidden');
                ajaxMessage.classList.add('bg-red-100', 'text-red-700');
                ajaxMessage.textContent = data.message || 'Terjadi kesalahan. Silakan coba lagi.';
                if (data.errors) {
                    for (const key in data.errors) {
                        data.errors[key].forEach(error => {
                            console.error(error);
                        });
                    }
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            ajaxMessage.classList.remove('hidden');
            ajaxMessage.classList.add('bg-red-100', 'text-red-700');
            ajaxMessage.textContent = 'Terjadi kesalahan jaringan atau server.';
        });
    });


    questionsTableBody.addEventListener('click', function(e) {
        if (e.target.classList.contains('delete-btn')) {
            const questionId = e.target.dataset.id;
            if (confirm('Apakah Anda yakin ingin menghapus soal ini?')) {
                fetch(`/admin/kursus/delete/${questionId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ _method: 'DELETE' })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        ajaxMessage.classList.remove('hidden');
                        ajaxMessage.classList.add('bg-green-100', 'text-green-700');
                        ajaxMessage.textContent = data.message;
                        document.getElementById(`question-${questionId}`).remove();
                    } else {
                        ajaxMessage.classList.remove('hidden');
                        ajaxMessage.classList.add('bg-red-100', 'text-red-700');
                        ajaxMessage.textContent = data.message || 'Gagal menghapus soal.';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    ajaxMessage.classList.remove('hidden');
                    ajaxMessage.classList.add('bg-red-100', 'text-red-700');
                    ajaxMessage.textContent = 'Terjadi kesalahan jaringan saat menghapus.';
                });
            }
        }
    });
});
</script>
@endpush
