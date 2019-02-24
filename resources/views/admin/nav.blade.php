<ul class="nav navbar-nav">
    <li class=""><a href="{{route('adminDashboard')}}"><i class="icon-display4 position-left"></i> Dashboard</a></li>

    <li class=""><a href="{{route('adminMetaTagsEdit')}}"><i class="icon-display4 position-left"></i> Meta теги</a></li>

    <li class=""><a href="{{route('adminHeaderEdit')}}"><i class="icon-display4 position-left"></i> Header</a></li>

    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-puzzle4 position-left"></i> О нас <span class="caret"></span></a>

        <ul class="dropdown-menu">
            <li class="">
                <a href="{{route('adminOurStoryHeaderEdit')}}"><i class="icon-display4 position-left"></i> Заголовок</a>
            </li>
            <li class="">
                <a href="{{route('adminOurStoryImagesScroll')}}"><i class="icon-display4 position-left"></i> Картины</a>
            </li>
        </ul>
    </li>

    <li class=""><a href="{{route('adminBookATableEdit')}}"><i class="icon-display4 position-left"></i> Заказать столик</a></li>

    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-puzzle4 position-left"></i> Меню <span class="caret"></span></a>

        <ul class="dropdown-menu">
            <li class="">
                <a href="{{route('adminMenuHeaderEdit')}}"><i class="icon-display4 position-left"></i> Заголовок</a>
            </li>
            <li class="">
                <a href="{{route('adminMenuCategoriesScroll')}}"><i class="icon-display4 position-left"></i> Категории</a>
            </li>
            <li class="">
                <a href="{{route('adminMenuDishesScroll')}}"><i class="icon-display4 position-left"></i> Блюда</a>
            </li>
        </ul>
    </li>

    <li class=""><a href="{{route('adminInstagramHeaderEdit')}}"><i class="icon-display4 position-left"></i> Инстаграм заголовок</a></li>

    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-puzzle4 position-left"></i> Моменты <span class="caret"></span></a>

        <ul class="dropdown-menu">
            <li class="">
                <a href="{{route('adminMomentsHeaderEdit')}}"><i class="icon-display4 position-left"></i> Заголовок</a>
            </li>
            <li class="">
                <a href="{{route('adminMomentsImagesScroll')}}"><i class="icon-display4 position-left"></i> Картины</a>
            </li>
        </ul>
    </li>

    <li class=""><a href="{{route('adminContactsEdit')}}"><i class="icon-display4 position-left"></i> Контакты</a></li>

    <li class=""><a href="{{route('adminSettingsEdit')}}"><i class="icon-display4 position-left"></i> Настройки</a></li>
</ul>