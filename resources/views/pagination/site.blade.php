<?php
// config
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)

$half_total_links = floor($link_limit / 2);
$from = $paginator->currentPage() - $half_total_links;
$to = $paginator->currentPage() + $half_total_links;
if ($paginator->currentPage() < $half_total_links) {
    $to += $half_total_links - $paginator->currentPage();
}
if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
    $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
}
?>

@if ($paginator->lastPage() > 1)

    <a class="prev-button" href="{{ ($paginator->currentPage() > 1) ? route($route, ["page" => $paginator->currentPage()-1]).(Request::getQueryString() ? "?".Request::getQueryString() : "") : "javascript:void(0)" }}"></a>

    <ul>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            @if ($from < $i && $i < $to)
                <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a href="{{ route($route, ["page" => $i]).(Request::getQueryString() ? "?".Request::getQueryString() : "") }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
    </ul>

    <a class="next-button" href="{{ ($paginator->currentPage() != $paginator->lastPage()) ? route($route, ["page" => $paginator->currentPage()+1]).(Request::getQueryString() ? "?".Request::getQueryString() : "") : "javascript:void(0)" }}" ></a>

@endif