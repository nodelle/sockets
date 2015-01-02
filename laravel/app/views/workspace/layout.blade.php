<section class="container-fluid">
    <aside class="col-sm-2 well">
        <nav>
            <ul class="nav">
                @foreach ($user->workspaces as $ws)
                    <li><a href="{{ route('workspace.show', [$ws->id]) }}">{{ $ws->name }}</a></li>
                @endforeach
            </ul>
        </nav>
    </aside>

    <main class="col-sm-10">
        {{ $content }}
    </main>
</section>