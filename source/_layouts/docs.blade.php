@extends('_layouts.base')

@section('main')

  <div class="flex justify-between">
    <aside id="docs-table-of-content" class="pr-6">
      <nav>
        <h2 class="mb-6 text-xl font-semibold leading-10">Documentation</h2>
        @foreach($page->getDocsToc() as $name => $items)
          <h3 class="font-display text-sm font-semibold leading-6">{{ $name }}</h3>

          <ul role="list" class="mt-2 mb-3 space-y-2 border-l-2 border-stone-100 lg:mt-4 lg:mb-6 lg:space-y-4 lg:border-stone-200">
            @foreach($items as $p)

              <li class="relative">
                @if($p['disabled'])
                  <span class="cursor-not-allowed block w-full pl-3.5 before:pointer-events-none before:absolute before:-left-1 before:top-1/2 before:h-1.5 before:w-1.5 before:-translate-y-1/2 before:rounded-full text-stone-700 before:bg-stone-300 hover:before:block before:hidden">
                    {{ $p['title'] }}
                  </span>
                @else
                  <a href="{{ $p['url'] }}" class="block w-full pl-3.5 before:pointer-events-none before:absolute before:-left-1 before:top-1/2 before:h-1.5 before:w-1.5 before:-translate-y-1/2 before:rounded-full text-stone-700 before:bg-stone-300 hover:text-stone-800 hover:before:block @if($page->activePage($p['url'])) font-semibold before:block @else before:hidden @endif">
                    {{ $p['title'] }}
                  </a>
                @endif
              </li>

            @endforeach
          </ul>
        @endforeach
      </nav>
    </aside>

    <div class="w-full max-w-[65ch]">
      <article>
        <header class="mb-9 space-y-1">
          <p class="font-display text-sm font-medium text-red-600">{{ $page->toc_section }}</p>
          <h1 class="font-display text-3xl tracking-tight text-stone-900">{{ $page->title }}</h1>
        </header>

        <div class="prose prose-stone max-w-none prose-headings:scroll-mt-28 prose-headings:font-display prose-headings:font-normal lg:prose-headings:scroll-mt-[8.5rem] prose-lead:text-stone-500  prose-a:font-semibold hover:prose-a:[--tw-prose-underline-size:6px] prose-pre:rounded-xl prose-pre:bg-stone-900 prose-pre:shadow-lg">

          @yield('content')

        </div>
      </article>
    </div>
  </div>

@endsection
