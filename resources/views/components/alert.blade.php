@if (session('success'))
    <div id="mainSuccessAlertDiv" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div id="mainErrorAlertDiv" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

@if (session('info'))
    <div id="mainInfoAlertDiv" class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-4">
        {{ session('info') }}
    </div>
@endif

@if (session('warning'))
    <div id="mainWarningAlertDiv" class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">
        {{ session('warning') }}
    </div>
@endif
