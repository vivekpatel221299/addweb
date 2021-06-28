<aside class="main-sidebar">

    <section class="sidebar">

        
        <?php echo dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'MAIN NAVIGATION', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['site/index']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],		
					
					
					
						['label' => 'Short Links', 'icon' => 'fa fa-bullseye', 'url' => ['/tbl-shortlink/index'],'active' => ($this->context->route == 'tbl-shortlink/create' || $this->context->route == 'tbl-shortlink/index' || $this->context->route == 'tbl-shortlink/update' || $this->context->route == 'tbl-shortlink/view')],
					
					
					
					
					
					
                ],
            ]
        ) ?>

    </section>

</aside>


