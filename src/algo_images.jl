using Plots

# Define the initial state
initial_state = zeros(101)
initial_state[51] = 1

# Define the update rule
function update_rule(state)
    new_state = copy(state)
    for i in 2:length(state)-1
        new_state[i] =  1 .* (Bool(state[i-1]) ⊻ Bool(state[i+1]))
    end
    return new_state
end

# Update the state for 100 iterations
states = [initial_state]
mat = zeros(101, 100)
for i in 1:100
    state = update_rule(states[end])
    mat[:,i] = state
    #push!(states, state)
end

# Plot the cellular automaton
heatmap(states, c = :grays)