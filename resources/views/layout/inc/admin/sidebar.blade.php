<div id="sidebar-overlay" class="overlay w-100 vh-100 position-fixed d-none"></div>

<!-- sidebar -->
<div class="col-md-3 col-lg-2 px-0 position-fixed h-100 bg-white shadow-sm sidebar" id="sidebar">
    <h1 class="text-primary d-flex my-4 justify-content-center">Travel AI</h1>
    <div class="list-group rounded-0">
        <a href="{{ url('admin/dashboard') }}" class="list-group-item list-group-item-action border-0 align-items-center">
            <span class="bi bi-border-all"></span>
            <span class="">Dashboard</span>
        </a>
        <button
            class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center"
            data-toggle="collapse" data-target="#purchase-collapse">
            <div>
                <span class="bi bi-airplane"></span>
                <span class="ml-2">Discover</span>
            </div>
            <span class="bi bi-chevron-down small"></span>
        </button>
        <div class="collapse" id="purchase-collapse" data-parent="#sidebar">
            <div class="list-group">
                <a href="{{ route('admin.discover.index') }}" class="list-group-item list-group-item-action border-0 pl-5">View List</a>
                <a href="{{ route('discover.create') }}" class="list-group-item list-group-item-action border-0 pl-5">Add List</a>
            </div>
        </div>
        <a href="#" class="list-group-item list-group-item-action border-0 align-items-center">
            <span class="bi bi-people"></span>
            <span class="ml-2">Manage User</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action border-0 align-items-center">
            <span class="bi bi-folder"></span>
            <span class="ml-2">Inbox</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action border-0 align-items-center">
            <span class="bi bi-flag-fill"></span>
            <span class="ml-2">Support Center</span>
        </a>
    </div>
</div>
