<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                            href="{{route('index')}}" aria-expanded="false"><i
                            class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a></li>


                <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark"
                                            href="javascript:void(0)" aria-expanded="false"><i
                            class="mdi mdi-receipt"></i><span
                            class="hide-menu">Quản lý danh mục </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('categories.index')}}" class="sidebar-link">
                                <i class="mdi mdi-note-plus"></i>
                                <span class="hide-menu"> Danh sách danh mục</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('categories.create')}}" class="sidebar-link">
                                <i class="mdi mdi-note-outline"></i>
                                <span class="hide-menu"> Thêm mới danh mục</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark"
                                            href="javascript:void(0)" aria-expanded="false"><i
                            class="mdi mdi-receipt"></i><span
                            class="hide-menu">Quản lý chủ đề </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('tags.index')}}" class="sidebar-link">
                                <i class="mdi mdi-note-plus"></i>
                                <span class="hide-menu"> Danh sách chủ đề</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('tags.create')}}" class="sidebar-link">
                                <i class="mdi mdi-note-outline"></i>
                                <span class="hide-menu"> Thêm mới chủ đề</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark"
                                            href="javascript:void(0)" aria-expanded="false"><i
                            class="mdi mdi-receipt"></i><span
                            class="hide-menu">Quản lý khóa học</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('courses.index')}}" class="sidebar-link">
                                <i class="mdi mdi-note-plus"></i>
                                <span class="hide-menu"> Danh sách khóa học</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('courses.create')}}" class="sidebar-link">
                                <i class="mdi mdi-note-outline"></i>
                                <span class="hide-menu"> Thêm mới khóa học</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark"
                                            href="javascript:void(0)" aria-expanded="false"><i
                            class="mdi mdi-receipt"></i><span
                            class="hide-menu">Quản lý bài giảng</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('lessons.index')}}" class="sidebar-link">
                                <i class="mdi mdi-note-plus"></i>
                                <span class="hide-menu"> Danh sách bài giảng</span>
                            </a>
                        </li>

                    </ul>
                </li>


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
