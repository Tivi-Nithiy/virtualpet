# Virtual Pet (Tamagotchi) — OO-Focused CLI Project

## Goal

Build a **virtual pet simulator** as a CLI program that strongly reinforces **object-oriented thinking** through **stateful behaviour, encapsulation, and interacting rules**.

This project is intentionally **non-enterprise**, non-CRUD, and non-work-like.  
The challenge is not the UI — it’s **designing a living object whose behaviour emerges over time**.

Run it like:
```bash
php bin/pet.php
```

Then interact via a simple read–eval–print loop until `quit`.

---

## Design Intent

This project is meant to **feel different** from more work-life training projects:

- There is **no linear workflow**
- There is **no single “state machine”**
- Multiple internal attributes interact simultaneously
- Time passing (`tick`) is as important as user actions

Poor OO design will feel brittle and explode in complexity.  
Good OO design will feel calm and readable.

---

## Constraints

### Allowed

- Plain PHP (8.1+ recommended)
- Simple CLI loop using `STDIN` / `STDOUT`
- In-memory state only (no persistence required)
- Enums, value objects, exceptions — your choice

### Not allowed / strongly discouraged

- Frameworks
- Databases
- “God arrays” holding all pet state
- CLI code mutating pet internals directly
- Procedural helpers like `updatePetStats($pet)`

---

## Core Domain: The Pet

You are modeling **one living creature**.

### Required internal attributes (minimum)
You may name them differently, but these concepts must exist:

- Hunger (0–100)
- Energy (0–100)
- Happiness (0–100)
- Health (0–100)
- Age (integer ticks)
- Alive / Dead

> **Rule:** Values must stay within bounds. This is the pet’s responsibility, not the CLI’s.

---

## Time and Behaviour

### `tick` (the most important command)

Calling `tick` advances time by **one unit**.

On every tick:
- Hunger increases
- Energy decreases
- Happiness may drift
- Health may improve or degrade depending on other stats
- Age increments

**No other command may advance time.**

---

## User Commands (MVP)
Commands should be single words or word + optional argument.

```
status
tick
feed
play
sleep
rename <name>
help
quit
```

---

## Behavioural Rules (examples, not prescriptions)

You must design *some* interactions like these — exact numbers are up to you.

Examples:
- If hunger > 80 → health slowly decreases
- If energy < 20 → play is not allowed
- If happiness < 20 for too long → health degrades
- If health reaches 0 → pet dies (game over)

Rules live **inside the Pet**, not in the CLI.

---

## Acceptance Scenarios

1. Repeated `tick` without feeding eventually harms health
2. Feeding reduces hunger but can backfire if overused
3. Playing while exhausted is rejected
4. Sleeping restores energy but increases hunger
5. Health never exceeds bounds
6. Dead pet cannot be interacted with
7. CLI never mutates pet stats directly
