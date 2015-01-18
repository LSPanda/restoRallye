@if ($paginator->getLastPage() > 1)
    <div class="pagination">
        {{-- Première page --}}
        <span class="inline-block pagination__element">
            <a {{ ($paginator->getCurrentPage() > 2) ? 'href="' . $paginator->getUrl(1) . '#paginationAnchor"' : '' }} title="Première page" class="block removeLink pagination__element--links">&lang;&lang;</a>
        </span>

        {{-- Page précédente --}}
        <span class="inline-block pagination__element">
            <a {{ ($paginator->getCurrentPage() > 1) ? 'href="' . $paginator->getUrl($paginator->getCurrentPage()- 1) . '#paginationAnchor"' : '' }} title="Page précédente" class="block removeLink pagination__element--links">&lang;</a>
        </span>

        {{-- Liste des pages --}}
        @for ($i = 1; $i <= $paginator->getLastPage(); $i++)
            <span class="inline-block pagination__element">
                <a {{ ($paginator->getCurrentPage() == $i) ? '' : ' href="' . $paginator->getUrl($i) . '#paginationAnchor"' }} title="Aller à la page {{ $i }}" class="block pagination__element--links">{{ $i }}</a>
            </span>
         @endfor

        {{-- Page suivante --}}
        <span class="inline-block pagination__element">
            <a {{ ($paginator->getCurrentPage() < $paginator->getLastPage()) ? 'href="' . $paginator->getUrl($paginator->getCurrentPage() + 1) . '#paginationAnchor"' : '' }} title="Page suivante" class="block removeLink pagination__element--links">&rang;</a>
        </span>

        {{-- Dernière page --}}
        <span class="inline-block pagination__element">
            <a {{ ($paginator->getCurrentPage() < $paginator->getLastPage() - 1) ? 'href="' . $paginator->getUrl($paginator->getLastPage()) . '#paginationAnchor"' : '' }} title="Dernière page" class="block removeLink pagination__element--links">&rang;&rang;</a>
        </span>
    </div>
@endif
