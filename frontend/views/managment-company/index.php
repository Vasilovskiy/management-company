<?php

use yii\helpers\Html;
use yii\widgets\ListView;

?>
<?php

$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<h1><?= Html::encode($this->title) ?></h1>

<?php

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => 'company_view',
    'layout' => "{pager}\n{summary}\n{items}\n{pager}",
    'summary' => 'Показано {count} из {totalCount}',
    'emptyText' => 'Список пуст',

]);

?>
