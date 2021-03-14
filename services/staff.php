
<?php
function create($data)
{
    if (isset($data->empId) && $data->empId != '' && isset($data->name) && $data->name != '' && isset($data->gender) && $data->gender != '' && isset($data->designation) && $data->designation != '' && isset($data->experience) && $data->experience != '') {
        $staff = new Staff();

        $staff->emp_id = filter($data->empId);
        $staff->name = filter($data->name);
        $staff->gender = filter($data->gender);
        $staff->designation = filter($data->designation);
        $staff->experience = filter($data->experience);

        if ($staff->readUsingUniqueKey()) {
            if ($staff->count > 0) error(409, NULL, 'Staff already exists');
            else {
                if ($staff->create()) {
                    if ($staff->count > 0) {
                        $data = ['id' => $staff->last_id];
                        success(200, 'Staff added', $data);
                    } else error(500, $staff->error, 'Unable to add staff');
                } else error(500, $staff->error, 'Unable to add staff');
            }
        } else error(500, $staff->error, 'Unable to add staff');
        $staff = NULL;
    } else error(400, NULL, 'Some input missing');
    DB::obj()->close();
}

function update($data, $id)
{
    if (isset($id) && $id != '' && isset($data->name) && $data->name != '' && isset($data->gender) && $data->gender != '' && isset($data->designation) && $data->designation != '' && isset($data->experience) && $data->experience != '') {
        $staff = new Staff();

        $staff->id = filter($id);
        $staff->name = filter($data->name);
        $staff->gender = filter($data->gender);
        $staff->designation = filter($data->designation);
        $staff->experience = filter($data->experience);

        if ($staff->update()) {
            if ($staff->count > 0) {
                success(200, 'Staff updated');
            } else error(400, $staff->error, 'Sounds like you gave the old information');
        } else error(500, $staff->error, 'Unable to update staff');
        $staff = NULL;
    } else error(400, NULL, 'Some input missing');
    DB::obj()->close();
}

function readAll()
{
    $staff = new Staff();
    if ($staff->readAll()) {
        if ($staff->count > 0) {
            $data = camelCaseArray($staff->result);
            success(200, NULL, $data);
        } else error(404, NULL, 'Nothing found');
    } else error(500, $staff->error, 'Unable to fetch data');
    $staff = NULL;
}

function readUsingId($id)
{
    if (isset($id) && $id != '') {
        $staff = new Staff();
        $staff->id = filter($id);
        if ($staff->readUsingId()) {
            if ($staff->count > 0) {
                $data = camelCaseArray($staff->result);
                success(200, NULL, $data);
            } else error(404, NULL, 'Nothing found');
        } else error(500, $staff->error, 'Unable to fetch data');
        $staff = NULL;
    } else error(400, NULL, 'ID required');
}
