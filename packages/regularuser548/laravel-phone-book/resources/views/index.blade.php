@extends('laravel-phone-book::app')

@section('content')
    <div class="py-4">

        <h2 class="mb-4">Додати новий контакт</h2>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрити"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Помилки при заповненні форми:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Форма додавання --}}
        <form method="POST" action="{{ route('contacts.store') }}" id="contact-form">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Ім’я</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="surname" class="form-label">Прізвище</label>
                    <input type="text" name="surname" class="form-control" required>
                </div>
            </div>

            <div class="mt-3">
                <label class="form-label">Телефони</label>
                <div id="phone-fields">
                    <div class="input-group mb-2">
                        <input type="tel" name="phones[]" class="form-control"
                               placeholder="Введіть телефон у форматі: +[код країни][номер]" required
                               pattern="^\+[1-9]\d{1,14}$">
                        <button type="button" class="btn btn-outline-secondary add-phone">+</button>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Зберегти</button>
        </form>

        <hr class="my-5">

        <h2 class="mb-4">Список контактів</h2>

        {{-- Таблиця з контактами --}}
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Ім’я</th>
                    <th>Прізвище</th>
                    <th>Телефони</th>
                    <th>Дії</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($contacts as $contact)
                    <tr>
                        <td>{{ $loop->iteration + ($contacts->currentPage() - 1) * $contacts->perPage() }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->surname }}</td>
                        <td>
                            <ul class="list-unstyled mb-0">
                                @foreach ($contact->phones as $phone)
                                    <li>{{ $phone->number }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            {{-- Видалити --}}
                            <form action="{{ route('contacts.destroy', $contact) }}" method="POST"
                                  onsubmit="return confirm('Ви впевнені, що хочете видалити цей контакт?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Видалити</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Контактів не знайдено</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            {{ $contacts->links() }}
        </div>

        <template id="phone-field-template">
            <div class="input-group mb-2">
                <input type="tel" name="phones[]" class="form-control"
                       placeholder="Введіть телефон у форматі: +[код країни][номер]" required
                       pattern="^\+[1-9]\d{1,14}$">
                <button type="button" class="btn btn-outline-danger remove-phone">-</button>
            </div>
        </template>

    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const phoneFields = document.getElementById('phone-fields');

            phoneFields.addEventListener('click', function (e) {
                if (e.target.classList.contains('add-phone')) {
                    const template = document.getElementById('phone-field-template');
                    const clone = template.content.cloneNode(true);
                    document.getElementById('phone-fields').appendChild(clone);
                }

                if (e.target.classList.contains('remove-phone')) {
                    e.target.closest('.input-group').remove();
                }
            });
        });
    </script>
@endpush

