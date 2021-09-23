@if (Auth::id())
    <div class="panel panel-default">
        <div class="panel-body">
            <ul class="sidebar-nav sidebar-divider">
                <li><a href="/user/{{Auth::id()}}/questions" title="My Questions"><i class="fa fa-lightbulb-o" style="color: #4285F4;"></i> <strong>Мои вопросы</strong></a></li>
                <li><a href="/user/{{Auth::id()}}/answers" title="My Answers"><i class="fa fa-bullhorn" style="color: #4285F4;"></i> <strong>Мои ответы</strong></a></li>
                <li><a href="/user/{{Auth::id()}}/notifications" title="My Notifications"><i class="fa fa-share-alt" style="color: #4285F4;"></i> <strong>Подтверждения</strong></a></li>
            </ul>
            <ul class="sidebar-nav sidebar-divider">
                <li><a href="/questions/top"><i class="fa fa-fire" style="color: #4285F4;"></i>ТОП Вопросов</a></li>
                <li><a href="/questions/new"><i class="fa fa-lightbulb-o" style="color: #4285F4;"></i>Новые вопросы</a></li>
            </ul>
        </div>
    </div>
@endif