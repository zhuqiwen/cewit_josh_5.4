<tr class="child_row" style="display: none">
    <td colspan="5">
        <div>
            <?php

                $contents = [
                    'ethnicity' => [
                            'title' => 'Ethnicity',
                            'content' => $ctStudent->ethnicity,
                    ],
                    'school' => [
                            'title' => 'School',
                            'content' => $ctStudent->school,
                    ],
                    'academic_career' => [
                            'title' => 'Academic Career',
                            'content' => $ctStudent->academic_career,
                    ],
                    'academic_standing' => [
                            'title' => 'Academic Standing',
                            'content' => $ctStudent->academic_standing,
                    ],
                ];

                echo \app\UiHelpers\containers::tabs($ctStudent->id, $contents);
            ?>
        </div>
    </td>

</tr>