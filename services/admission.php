<?php
function create($data)
{
    if (isset($data->name) && $data->name != '' && isset($data->father) && $data->father != '' && isset($data->gender) && $data->gender != '' && isset($data->regNo) && $data->regNo != '' && isset($data->school) && $data->school != '' && isset($data->address) && $data->address != '' && isset($data->mobileNumber) && $data->mobileNumber != '' && isset($data->passedOut) && $data->passedOut != '' && isset($data->course) && $data->course != '') {
        $admission = new Admission();

        $admission->name = filter($data->name);
        $admission->father = filter($data->father);
        $admission->gender = filter($data->gender);
        $admission->reg_no = filter($data->regNo);
        $admission->school = filter($data->school);
        $admission->address = filter($data->address);
        $admission->mobile_number = filter($data->mobileNumber);
        $admission->passed_out = filter($data->passedOut);
        $admission->course = filter($data->course);
        $admission->tamil = isset($data->tamil) ? filter($data->tamil) : NULL;
        $admission->english = isset($data->english) ? filter($data->english) : NULL;
        $admission->maths = isset($data->maths) ? filter($data->maths) : NULL;
        $admission->physics = isset($data->physics) ? filter($data->physics) : NULL;
        $admission->chemistry = isset($data->chemistry) ? filter($data->chemistry) : NULL;
        $admission->biology = isset($data->biology) ? filter($data->biology) : NULL;
        $admission->history = isset($data->history) ? filter($data->history) : NULL;
        $admission->commerce = isset($data->commerce) ? filter($data->commerce) : NULL;
        $admission->economics = isset($data->economics) ? filter($data->economics) : NULL;
        $admission->computer_science = isset($data->computerScience) ? filter($data->computerScience) : NULL;

        if ($admission->create()) {
            if ($admission->count > 0) {
                $data = ['id' => $admission->last_id];
                success(200, 'Admission added', $data);
            } else error(500, $admission->error, 'Unable to add admission');
        } else error(500, $admission->error, 'Unable to add admission');
        $admission = NULL;
    } else error(400, NULL, 'Some input missing');
    DB::obj()->close();
}

function readAll()
{
    $admission = new Admission();
    if ($admission->readAll()) {
        if ($admission->count > 0) {
            $data = camelCaseArray($admission->result);
            success(200, NULL, $data);
        } else error(404, NULL, 'Nothing found');
    } else error(500, $admission->error, 'Unable to fetch data');
    $admission = NULL;
}

function readUsingId($id)
{
    if (isset($id) && $id != '') {
        $admission = new Admission();
        $admission->id = filter($id);
        if ($admission->readUsingId()) {
            if ($admission->count > 0) {
                $data = camelCaseArray($admission->result);
                success(200, NULL, $data);
            } else error(404, NULL, 'Nothing found');
        } else error(500, $admission->error, 'Unable to fetch data');
        $admission = NULL;
    } else error(400, NULL, 'ID required');
}
