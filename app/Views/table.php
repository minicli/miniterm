<table>
    <thead>
        <tr>
            <?php foreach ($headers as $header): ?>
                <th><?=$this->e($header) ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row): ?>
            <tr>
                <?php foreach ($row as $cell): ?>
                    <td><?=$this->e($cell) ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
