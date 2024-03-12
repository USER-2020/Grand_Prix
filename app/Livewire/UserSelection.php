<?php

namespace App\Livewire;

use App\Models\Team;
use App\Models\User;
use Livewire\Component;
use App\Models\Spreadsheet;
use App\Models\SpreadsheetUser;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;

class UserSelection extends Component
{
    public $selectedTeamId;
    public $selectedUsers = [];
    public $newUserName;
    public $newUserEmail;
    public $team;
    public $users;

    public $relationsUSerSpreadSheet;

    protected $listeners = ['updateSelectedUsers'];

    public function mount()
    {
        // Obtén el team_id de la ruta
        $this->users = User::whereHas('roles', function ($query) {
            $query->where('name', 'player');
        })->get();
        $this->selectedTeamId = Route::current()->parameter('team');
    }

    public function render()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'player');
        })->get();

        $team = Team::find($this->selectedTeamId);

        if (!$team || !$team->spreadsheet) {
            return view('livewire.user-selection', ['users' => []]);
        }

        // Obtener los usuarios de la tabla con la relación
        $selectedSpreadsheetId = $team->spreadsheet->id;
        $table_users = SpreadsheetUser::where('spreadsheet_id', $selectedSpreadsheetId)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->take(13)
            ->get()
            ->pluck('user');

        return view('livewire.user-selection', compact('users', 'table_users'));
    }

    public function updateSelectedUsers()
    {

        // dd($this->selectedUsers, $this->selectedTeamId);
        if (!$this->selectedTeamId) {
            return;
        }

        $team = Team::with('spreadsheet')->find($this->selectedTeamId);
        // dd($team);

        if (!$team || !$team->spreadsheet) {
            return;
        }

        // Use sync to synchronize the users
        // $team->spreadsheet->users()->attach($this->selectedUsers);
        $usersToAttach = $this->selectedUsers;

        foreach ($usersToAttach as $userId) {
            $team->spreadsheet->users()->attach($userId, ['created_at' => now(), 'updated_at' => now()]);
        }

        // Renderiza parcialmente el componente
        $this->render();
    }

    public function addUser()
    {
        // Comprueba si el usuario ya existe en la base de datos por correo electrónico
        $existingUser = User::where('email', $this->newUserEmail)->first();

        // Obtén el ID del spreadsheet asociado al equipo
        $team = Team::find($this->selectedTeamId);
        $selectedSpreadsheetId = $team->spreadsheet->id;
        // dd($selectedSpreadsheetId);
        if ($existingUser) {
            // Si el usuario ya existe, simplemente agrégalo a la lista
            SpreadsheetUser::create([
                'spreadsheet_id' => $selectedSpreadsheetId,
                'user_id' => $existingUser->id,
            ]);
        } else {
            // Si el usuario no existe, créalo y agrégalo a la lista
            $newUser = User::create([
                'name' => $this->newUserName,
                'email' => $this->newUserEmail,
                'password' => bcrypt('password'),
            ]);

            // Asigna el rol "player" al usuario
            $rolePlayer = Role::where('name', 'player')->first();
            $newUser->assignRole($rolePlayer);

            SpreadsheetUser::create([
                'spreadsheet_id' => $selectedSpreadsheetId,
                'user_id' => $newUser->id,
            ]);
        }

        // Limpia los campos del formulario
        $this->reset(['newUserName', 'newUserEmail']);
        $this->render();

    }




    // public function associateData()
    // {
    //     // Asegúrate de que tengas el ID del equipo
    //     if (!$this->selectedTeamId) {
    //         return;
    //     }

    //     // Crea o recupera el spreadsheet asociado al equipo
    //     $spreadsheet = Spreadsheet::updateOrCreate(
    //         ['team_id' => $this->selectedTeamId],
    //         ['name' => 'Nombre del spreadsheet'] // Ajusta según tus necesidades
    //     );

    //     // Asocia los usuarios seleccionados al spreadsheet
    //     foreach ($this->selectedUsers as $userData) {
    //         $user = User::create($userData);
    //         SpreadsheetUser::updateOrCreate(
    //             ['spreadsheet_id' => $spreadsheet->id, 'user_id' => $user->id],
    //             [] // Puedes ajustar campos adicionales según tus necesidades
    //         );
    //     }

    //     // Limpia la lista de usuarios seleccionados
    //     $this->selectedUsers = [];
    // }
}
