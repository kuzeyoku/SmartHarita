<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="submenu-open">
                    <ul>
                        <li class="@if (!request()->segment(2)) active @endif">
                            <a href="{{ route('admin.index') }}">
                                <i data-feather="grid"></i><span>@lang('admin/home.title')</span>
                            </a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="@if (request()->segment(2) == 'setting') subdrop active @endif"><i
                                    data-feather="settings"></i><span>@lang('admin/setting.title')</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                @foreach (App\Enums\SettingCategoryEnum::cases() as $setting)
                                    <li>
                                        <a class="@if (request()->category == $setting->value) active @endif"
                                            href="{{ route('admin.setting', ['category' => $setting->value]) }}">{{ $setting->title() }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        @foreach (App\Enums\ModuleEnum::cases() as $module)
                            @if ($module->status())
                                @if (count($module->menu()) == 1)
                                    <li>
                                        <a href="{{ route("admin.{$module->route()}.index") }}">
                                            <i
                                                data-feather="{{ $module->icon() }}"></i><span>{{ $module->title() }}</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="submenu">
                                        <a href="javascript:void(0);">
                                            <i
                                                data-feather="{{ $module->icon() }}"></i><span>{{ $module->title() }}</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul>
                                            @foreach ($module->menu() as $route => $title)
                                                <li>
                                                    <a href="{{ route("admin.{$module->route()}.{$route}") }}">
                                                        {{ $title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
