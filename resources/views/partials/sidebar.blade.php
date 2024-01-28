<div class="card">
    <div class="card-header">Меню</div>
    <div class="card-body">
        <nav class="nav flex-column">
            <a class="nav-link" href="{{ route('home') }}">Мои Чек Листы</a>
            <a class="nav-link" href="{{ route('lists.index') }}">Все Чек Листы</a>
            <a class="nav-link" href="{{ route('users.index') }}">Пользователи</a>
            @hasanyrole('Администратор|Менеджер')
            <a class="nav-link" href="{{ route('roles.index') }}">Роли и разрешения</a>
            @endhasanyrole
        </nav>
    </div>
</div>
